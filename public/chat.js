const form = document.getElementById('form');
const input = document.getElementById('input');
const messages = document.getElementById('messages');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (input.value.trim()) {
        // Envoi du message
        await fetch('send.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'msg=' + encodeURIComponent(input.value.trim())
        });
        input.value = '';

        // Recharge les messages
        const res = await fetch('messages.php');
        const html = await res.text();
        messages.innerHTML = html;
    }
});

// Rafraîchissement automatique toutes les 3 secondes
setInterval(async () => {
    const res = await fetch('messages.php');
    const html = await res.text();
    messages.innerHTML = html;
}, 3000);