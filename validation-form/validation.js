function validateForm(formSelector) {
  const form = document.querySelector(formSelector)
  const submit = form.querySelector('[type="submit"]')
  const validateFields = form.querySelectorAll('[data-validate]')

  const phoneValidateRegexp = /^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/
  const emailValidateRegexp =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

  const isFormSuccess = () => {
    const notValidateFields = form.querySelectorAll("[data-status='false']")
    return notValidateFields.length === 0
  }

  for (const field of validateFields) {
    const validateType = field.dataset.validate
    const requiredField = field.dataset.required === 'true'

    field.dataset.status = !requiredField

    // if (validateType === 'text' && requiredField) field.dataset.status = false
    // else if (validateType === 'text' && !requiredField)
    //   field.dataset.status = true
    // else field.dataset.status = false

    field.addEventListener('input', (event) => {
      let status = false
      const value = event.target.value.trim()

      if (validateType === 'text') status = value.length > 5 || !requiredField

      if (validateType === 'phone') {
        status =
          phoneValidateRegexp.test(value) || (!requiredField && value === '')
      }

      if (validateType === 'email') {
        status =
          emailValidateRegexp.test(value) || (!requiredField && value === '')
      }

      event.target.dataset.status = status

      if (isFormSuccess()) return submit.removeAttribute('disabled')
      if (!submit.hasAttribute('disabled'))
        return submit.setAttribute('disabled', true)
    })
  }
}

document.validateForm = validateForm
