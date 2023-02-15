window.addEventListener('DOMContentLoaded', () => {
  function setPlusIcon() {
    const liElements = document.querySelectorAll('li')
    const aElements = document.querySelectorAll('a[href="#"]')

    for (const li of liElements) {
      const ulInLi = li.querySelectorAll('ul')

      if (ulInLi.length > 0) {
        li.classList.add('drop-list-trigger')
      }
    }

    for (const a of aElements) {
      a.addEventListener('click', aClick)
    }
  }

  function aClick(event) {
    const target = event.target
    const parent = target.parentNode

    if (parent.classList.contains('drop-list-trigger')) {
      event.preventDefault()
      const dropList = parent.querySelector('.drop-list')
      dropList.classList.add('open')
    }
  }

  setPlusIcon()
})
