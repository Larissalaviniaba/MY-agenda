function get_data_contact(id) {
    fetch("/contatos/" + id)
        .then((response) => response.json())
        .then((data) => fill_space_contact(data))
        .catch((err) => console.error(err));
}

function fill_space_contact(data) {

    let contact_profile = document.querySelector('.contact_profile');
    let img = document.querySelector('.contact_profile > img');
    let h3 = document.querySelector('.contact_profile > h3');
    let p_number = document.querySelector('#p_number')
    let p_email = document.querySelector('#p_email')
    let contact_info = document.querySelector('.contact_info')
    let a = document.querySelector('.contact_info > .group_buttons > a')
    let form = document.querySelector('.contact_info > .group_buttons> form')
    let contacts = document.querySelectorAll('.contact')

    contacts.forEach(contact => {


        if(contact_profile.classList.contains('hidden') && contact_info.classList.contains('hidden')){

            contact_profile.classList.remove('hidden')
            contact_info.classList.remove('hidden')

            contact.addEventListener('click',()=>{
                contact_profile.classList.add('hidden')
                contact_info.classList.add('hidden')
            })
            
        }

        img.src = `/imgs/contacts/${data.image}`;
        h3.innerHTML = `${data.name}`;
        p_number.innerHTML= `${data.number}`
        p_email.innerHTML= `${data.email}`
        a.href = `/contatos/editar/${data.id}`
        form.action = `/contatos/${data.id}`
       
        
    });

    
}