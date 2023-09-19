const hideSidebar = e => {
    if (e.target !== el('#sidebarToggle')) return

    const span = Array.from(elAll('.nav-item'))

    if (!e.target.classList.contains('on')) {
        e.target.classList.add('on')

        span.map(e => {
            if (!e.querySelector('span')) return

            e.querySelector('span').style.display = 'none'
        })

        return
    }

    e.target.classList.remove('on')

    span.map(e => {
        if (!e.querySelector('span')) return

        e.querySelector('span').style.display = 'initial'
    })

    return
}

window.addEventListener('click', hideSidebar)
