// const form = document.getElementById('search-form');

// form.addEventListener('submit', function (e) {
//     e.preventDefault();

//     const token = document.querySelector('meta[name="csrf-token"]') 
//     console.log(token);

//     const url = this.getAttribute('action');

//     const q = document.getElementById('q').value;

//     fetch(url, {
//         header: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': token
//         },
//         method: 'post',
//         body: JSON.stringify({
//             q: q
//         })
//     }).then(response => {
//         response.json().then(data => {

//             const shows = document.getElementsByClassName('shows');
//             shows.innerHTML += '';
//                     Object.entries(data)[0].forEach(element => {
//                         shows.innerHTML = `
//                         <h3>${ element.title }</h3>
//                         `
//                     });
//         })
//     }).catch(error => {
//         console.log(error)
//     })

// }); 