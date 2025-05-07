const toggleButton = document.getElementById('toggle_btn');
const sidebar = document.getElementById('sidebar');

function toggleSidebar() {
    sidebar.classList.toggle('close');
    toggleButton.classList.toggle('rotate');

    closeAllSubMenus();
}

function toggleSubMenu(button) {

    if (!button.nextElementSibling.classList.contains('show')) {
        closeAllSubMenus();
    }



    button.nextElementSibling.classList.toggle('show');
    button.classList.toggle('rotate');

    if (sidebar.classList.contains('close')) {
        sidebar.classList.toggle('close');
        toggleButton.classList.toggle('rotate');
    }
}

function closeAllSubMenus() {
    Array.from(sidebar.getElementsByClassName('show')).forEach((ul) => {
        ul.classList.remove('show');
        ul.previousElementSibling.classList.remove('rotate')
    })
}

const routes = document.querySelectorAll(".page_route");

if (localStorage.getItem('route')) {


    localStorage.setItem('route', window.location.href)

    routes.forEach((route) => {
        route.parentElement.classList.remove("active")
        console.log(route.parentElement)
    })

    routes.forEach((route) => {

        console.log(route.getAttribute('href'), window.location.href)
        if (route.getAttribute('href') === window.location.href) {
            route.parentElement.classList.add('active');
        }
    })

} else {
    localStorage.setItem('route', window.location.href)

    routes.forEach((route) => {
        route.parentElement.classList.remove('active')
    })

    routes.forEach((route) => {
        if (route.getAttribute.href === window.location.href) {
            route.parentElement.classList.add('active')
        }
    })
}

