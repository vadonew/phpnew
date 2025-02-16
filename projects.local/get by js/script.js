
document.querySelector('form').addEventListener('submit', e => {
    e.preventDefault();

    const data = {
        user_name: document.querySelector('input').value,
        phone: document.querySelector('input').value,
        email: document.querySelector('input').value
    }
 sendForm(data);
  
});
async function sendForm(data) {
    const res = await fetch('index.php', {
        method: 'POST',
        headers: {'Content-type': 'application/json'},
        body: JSON.stringify(data)
    });

    const result = await res.json();

    if (res.status === 201) {
        alert(`Thank you! ${result.message}`)
    } else {
        alert('Oops, something went wrong');
    }
}