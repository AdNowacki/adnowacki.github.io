const refs = {
  body: document.body,
  dropdown: document.querySelector('.select-lang__dropdown'),
  language: document.querySelector('.select-lang__selected'),
  mNavBtn: document.querySelector('.m-nav-action'),
  footerNavCategories: document.querySelectorAll('.main-footer__col')
}

const callbacks = {
  clickLanguageSelectorHandle(ev) {
    ev.stopPropagation();
    refs.dropdown.classList.toggle('open')
  },
  clickDocumentCloseList() {
    refs.dropdown.classList.remove('open')
  },
  toggleMobileNav() {
    refs.body.classList.toggle('open-nav')
  },
  toggleFooterNavCategory(el) {
    const { matches: isMobile } = window.matchMedia('(max-width: 960px)');
    if (!isMobile) return

    refs.footerNavCategories.forEach((elem) => {
      elem.classList.remove('open-category')
    })

    el.classList.add('open-category')
  }
}

refs.language.addEventListener('click', callbacks.clickLanguageSelectorHandle)
document.addEventListener('click', callbacks.clickDocumentCloseList)
refs.mNavBtn.addEventListener('click', callbacks.toggleMobileNav)
refs.footerNavCategories.forEach((elem) => {
  elem.addEventListener('click', callbacks.toggleFooterNavCategory.bind(null, elem))
})


