const express = require('express');
const app = express();
const http = require('http').createServer(app);
const { Server } = require('socket.io');
const io = new Server(http);
const mysql = require('mysql2');

// Connexion MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',       // ⚡ adapte avec ton utilisateur MySQL
  password: '',       // ⚡ ton mot de passe MySQL
  database: 'love_story'
});

db.connect((err) => {
  if (err) throw err;
  console.log('Connecté à MySQL ✅');
});

// Servir les fichiers statiques
app.use(express.static(__dirname + '/public'));

// Route principale
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/public/message.php');
});

// Socket.IO
io.on('connection', (socket) => {
  console.log('Un utilisateur est connecté');

  // Charger les anciens messages depuis MySQL
  db.query(`
    SELECT u.username, m.message 
    FROM messages As m, utilisateur As u 
    WHERE m.user_id = u.id 
    ORDER BY m.created_at ASC
  `, (err, results) => {
    if (!err) {
      results.forEach(row => {
        socket.emit('chat message', `${row.username}: ${row.message}`);
      });
    }
  });

  // Réception d’un nouveau message
  socket.on('chat message', ({username, msg}) => {
    console.log(`Message reçu de ${username}: ${msg}`);

    // Récupérer l’ID utilisateur
    db.query('SELECT id FROM utilisateur WHERE username = ?', [username], (err, rows) => {
      if (err) throw err;

      let userId;
      if (rows.length > 0) {
        userId = rows[0].id;
        insertMessage(userId, username, msg);
      } else {
        // Créer l’utilisateur si inexistant
        db.query('INSERT INTO utilisateur (username) VALUES (?)', [username], (err, result) => {
          if (err) throw err;
          userId = result.insertId;
          insertMessage(userId, username, msg);
        });
      }
    });

    function insertMessage(userId, username, msg) {
      db.query('INSERT INTO messages (user_id, message) VALUES (?, ?)', [userId, msg], (err) => {
        if (err) throw err;
        io.emit('chat message', `${username}: ${msg}`);
      });
    }
  });

  socket.on('disconnect', () => {
    console.log('Un utilisateur s\'est déconnecté');
  });
});

// Lancer le serveur
http.listen(3000, () => {
  console.log('Serveur en écoute sur http://localhost:3000');
});