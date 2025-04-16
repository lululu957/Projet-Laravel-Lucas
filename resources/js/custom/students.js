// document.addEventListener('DOMContentLoaded', () => {
//     const form = document.querySelector('#formStudent');
//
//     if (!form) {
//         console.error("Formulaire introuvable !");
//         return;
//     }
//
//     form.addEventListener('submit', async function(event) {
//         event.preventDefault();
//
//         const url = form.getAttribute('action') || "{{ route('student.store') }}";
//         const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
//
//         const formData = new FormData(form);
//
//         try {
//             const response = await fetch(url, {
//                 method: 'POST',
//                 headers: {
//                     'X-CSRF-TOKEN': csrfToken
//                     // Pas besoin de 'Content-Type' ici avec FormData
//                 },
//                 body: formData
//             });
//
//             console.log("Réponse reçue : ", response);
//
//             const contentType = response.headers.get("content-type");
//
//             if (!response.ok) {
//                 console.error("Réponse non ok : ", response.status, response.statusText);
//                 if (contentType && contentType.includes("application/json")) {
//                     const errorData = await response.json();
//                     console.error("Erreur JSON : ", errorData);
//                     alert("Erreur : " + (errorData.message || "Une erreur est survenue."));
//                 } else {
//                     const errorText = await response.text();
//                     console.error("Réponse non JSON :", errorText);
//                     alert("Erreur inattendue.");
//                 }
//                 return;
//             }
//
//             const data = await response.json();
//             console.log("Réponse JSON : ", data);
//
//             if (data.dom) {
//                 const table = document.querySelector('#students-table');
//                 table.insertAdjacentHTML('beforeend', data.dom);
//             } else {
//                 console.warn("Réponse reçue sans 'dom'");
//             }
//
//         } catch (error) {
//             console.error("Erreur lors du fetch :", error);
//             alert("Une erreur s'est produite lors de l'envoi du formulaire.");
//         }
//     });
// });
