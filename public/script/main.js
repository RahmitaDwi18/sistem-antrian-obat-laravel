// TODO: Global Function
const el = element => document.querySelector(`${element}`)
const elAll = element => document.querySelectorAll(`${element}`)

// TODO: Main
const setAktif = () => {
    el('.active').classList.remove('active')
    let target = location.href.split('/')
    let active = (el(`[href="${origin + '/' + target[3]}/index"]`)) ? el(`[href="${origin + '/' + target[3]}/index"]`) : el(`[href="${origin + '/admin/' + target[4]}/index"]`)

    if (!active) active = el(`[href="${location.href}"]`)
    if (!active) active = el(`[href="${location.pathname}"]`)

    if (active) active.parentElement.classList.add('active')
}

const setSelected = (data, id) => {
    const target = el(`[${data}]`).getAttribute(data)
    el(`#${id} [value="${target}"]`).setAttribute('selected', '')
}

const deleted = () => {
    document.addEventListener('click', e => {
        if (!el('.hapus')) return
        if (!el('.hapus').contains(e.target)) return

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Kamu tidak bisa mengembalikan data yang telah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if (result.isConfirmed) e.target.nextElementSibling.click()
            if (!result.isConfirmed) {
                e.target.style.boxShadow = '0 0 0 0 transparent'
                e.target.style.backgroundColor = '#e74a3b'
            }
        })
    })
}

setAktif()

const activation = () => {
    const button = document.querySelector('.activation')

    if (!button) return

    const form = button.form
    const inputs = [...form.querySelectorAll('.form-control')]
    const values = []

    inputs.map(e => values.push(e.value))

    console.log(values)
    let disabled = values.find(e => e === '')

    if (!disabled) button.setAttribute('disabled', '')
    if (disabled === undefined) button.removeAttribute('disabled')
}

document.addEventListener('keyup', activation)