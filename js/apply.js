var url_string = window.location.search;
var params = new URLSearchParams(url_string);

const title = params.get('title');
const id = params.get('id');
document.getElementById('title').innerHTML = params.get('title');

async function applyJob() {
    const first = document.getElementById('first').value;
    const last = document.getElementById('last').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const about = document.getElementById('about').value;

    var form = new FormData();
    form.append('title', title);
    form.append('id', id);
    form.append('first', first);
    form.append('last', last);
    form.append('email', email);
    form.append('phone', phone);
    form.append('about', about);

    const response = await fetch('http://localhost/job-portal-server/endpoints/Applications/apply.php', {
        method: 'POST',
        body: form,
    });
    //console.log(response.text());
}
