'use strict'

// Learn More button, page: sell-trade.html

const moreBtn = document.querySelector('[data-btn="more"]')
if (moreBtn) {
	moreBtn.addEventListener('click', () => {
		document.querySelector('#hidden-container').classList.add('active')
	})
}

// accordion function
function drawer(head) {
	head.parentElement.classList.toggle('active')
	let body = head.nextElementSibling

	if (body.style.maxHeight && body.style.maxHeight !== 'none') {
		body.style.maxHeight = null
	} else {
		body.style.maxHeight = body.scrollHeight + 'px'
	}
}

const drwawers = document.querySelectorAll('.drawer-btn')
if (drwawers.length) {
	drwawers.forEach((el) => {
		if (el.parentElement.classList.contains('active')) {
			el.nextElementSibling.style.maxHeight =
				el.nextElementSibling.scrollHeight + 'px'
		}

		el.onclick = () => drawer(el)
	})
}

/*=============== form scripts (number format, validation, etc.) ===============*/

const inputs = document.querySelectorAll('.input')
if (inputs.length) {
	// input:focus => placeholder move
	inputs.forEach((input) => {
		if (input.value.length) {
			input.classList.add('focus')
		}

		input.addEventListener('focus', () => {
			input.classList.add('focus')
		})

		input.addEventListener('blur', () => {
			if (!input.value.length) {
				input.classList.remove('focus')
			}
		})
	})

	// remove input error as user types
	for (let i = 0; i < inputs.length; i++) {
		const input = inputs[i]

		// set initial value
		input.setAttribute('data-value', input.value)

		// remove error
		input.addEventListener('input', () => {
			input.classList.remove('error')

			if (input.parentElement.querySelector('.input__error')) {
				input.parentElement.querySelector('.input__error').remove()
			}
		})
	}
}

// format
Inputmask({ mask: '(999) 999-9999' }).mask(
	document.querySelectorAll('[data-format-phone-number]')
)

// profile fields toggle
const barActions = document.querySelectorAll('.bar__actions')
if (barActions.length) {
	for (let i = 0; i < barActions.length; i++) {
		const action = barActions[i]
		const bar = action.closest('.bar')
		const barInputs = bar.querySelectorAll('.input')
		const openBtn = bar.querySelector('[data-open]')
		const closeBtns = bar.querySelectorAll('[data-close]')

		if (openBtn) {
			openBtn.addEventListener('click', () => {
				bar.classList.add('active')
			})
		}

		if (closeBtns.length) {
			for (let i = 0; i < closeBtns.length; i++) {
				const closeBtn = closeBtns[i]

				closeBtn.addEventListener('click', () => {
					bar.classList.remove('active')

					for (let i = 0; i < barInputs.length; i++) {
						const input = barInputs[i]
						input.value = input.getAttribute('data-value')
						if (!input.value.length) {
							input.classList.remove('focus')
						}
					}
				})
			}
		}
	}
}

// disable button
const forms = document.querySelectorAll('.form')
if (forms.length) {
	for (let i = 0; i < forms.length; i++) {
		const form = forms[i]
		const requiredInputs = form.querySelectorAll('.input[required]')
		const disabledButton = form.querySelector('button[disabled]')

		if (requiredInputs.length) {
			for (let i = 0; i < requiredInputs.length; i++) {
				const input = requiredInputs[i]
				input.addEventListener('input', () => {
					const isFilled = [...requiredInputs].every(
						(el) => el.value.length > 0
					)
					if (isFilled) {
						if (disabledButton) {
							disabledButton.removeAttribute('disabled')
						}
					} else {
						disabledButton.setAttribute('disabled', true)
					}
				})
			}
		}
	}
}

const modals = document.querySelectorAll('.modal')
if (modals.length) {
	for (let i = 0; i < modals.length; i++) {
		const modal = modals[i]
		const closeBtns = modal.querySelectorAll('[data-close]')

		for (let i = 0; i < closeBtns.length; i++) {
			const close = closeBtns[i]
			close.addEventListener('click', () => {
				modal.remove()
			})
		}
	}
}

// const modalBtns = document.querySelectorAll('[data-modal-btn]')
// if (modalBtns.length) {
// 	for (let i = 0; i < modalBtns.length; i++) {
// 		const btn = modalBtns[i]
// 		const attr = btn.getAttribute('data-modal-btn')
// 		console.log(btn, attr)

// 		btn.addEventListener('click', () => {
// 			document.querySelector(`[data-modal='${attr}']`).classList.add('active')
// 		})
// 	}
// }

/*=============== range slider ===============*/
const fromSlider = document.querySelector('#from-range')
const toSlider = document.querySelector('#to-range')
const fromInput = document.querySelector('#price-min')
const toInput = document.querySelector('#price-max')

function controlFromInput(fromSlider, fromInput, toInput, controlSlider) {
	const [from, to] = getParsed(fromInput, toInput)
	fillSlider(fromInput, toInput, '#f2f2f2', '#30A1FF', controlSlider)
	if (from > to) {
		fromSlider.value = to
		fromInput.value = to
	} else if (from <= to) {
		fromSlider.value = from
		fromInput.value = from
	} else {
		fromSlider.value = 0
		fromInput.value = 0
	}
}

function controlToInput(toSlider, fromInput, toInput, controlSlider) {
	const [from, to] = getParsed(fromInput, toInput)
	fillSlider(fromInput, toInput, '#f2f2f2', '#30A1FF', controlSlider)
	setToggleAccessible(toInput)
	if (from <= to) {
		toSlider.value = to
		toInput.value = to
	} else {
		toInput.value = from
		toSlider.value = from
	}
}

function controlFromSlider(fromSlider, toSlider, fromInput) {
	const [from, to] = getParsed(fromSlider, toSlider)
	fillSlider(fromSlider, toSlider, '#f2f2f2', '#30A1FF', toSlider)
	if (from > to) {
		fromSlider.value = to
		fromInput.value = to
	} else {
		fromInput.value = from
	}
}

function controlToSlider(fromSlider, toSlider, toInput) {
	const [from, to] = getParsed(fromSlider, toSlider)
	fillSlider(fromSlider, toSlider, '#f2f2f2', '#30A1FF', toSlider)
	setToggleAccessible(toSlider)
	if (from <= to) {
		toSlider.value = to
		toInput.value = to
	} else {
		toInput.value = from
		toSlider.value = from
	}
}

function getParsed(currentFrom, currentTo) {
	const from = parseInt(currentFrom.value, 10)
	const to = parseInt(currentTo.value, 10)
	return [from, to]
}

function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
	const rangeDistance = to.max - to.min
	const fromPosition = from.value - to.min
	const toPosition = to.value - to.min
	console.log(from.value, to.value)
	controlSlider.style.background = `linear-gradient(
    to right,
    ${sliderColor} 0%,
    ${sliderColor} ${(fromPosition / rangeDistance) * 100}%,
    ${rangeColor} ${(fromPosition / rangeDistance) * 100}%,
    ${rangeColor} ${(toPosition / rangeDistance) * 100}%,
    ${sliderColor} ${(toPosition / rangeDistance) * 100}%,
    ${sliderColor} 100%)`
}

function setToggleAccessible(currentTarget) {
	if (Number(currentTarget.value) <= 0) {
		toSlider.style.zIndex = 2
	} else {
		toSlider.style.zIndex = 0
	}
}

if ((fromInput, toInput, fromSlider, toSlider)) {
	fillSlider(fromSlider, toSlider, '#f2f2f2', '#30A1FF', toSlider)
	setToggleAccessible(toSlider)

	fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput)
	toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput)
	fromInput.oninput = () =>
		controlFromInput(fromSlider, fromInput, toInput, toSlider)
	toInput.oninput = () => controlToInput(toSlider, fromInput, toInput, toSlider)
}

/*=============== sliders ===============*/
var swiper = new Swiper('.photo-swiper', {
	slidesPerView: 'auto',
	spaceBetween: 20,
	freeMode: true,
	navigation: {
		nextEl: '.photo-swiper .swiper-button-next',
		prevEl: '.photo-swiper .swiper-button-prev',
	},
})

var swiper = new Swiper('.recommend-swiper', {
	slidesPerView: 'auto',
	spaceBetween: 20,
	freeMode: true,
	navigation: {
		nextEl: '.recommend-swiper .swiper-button-next',
		prevEl: '.recommend-swiper .swiper-button-prev',
	},
})

var swiper = new Swiper('.slider-swiper', {
	slidesPerView: 1,
	navigation: {
		nextEl: '.slider .swiper-button-next',
		prevEl: '.slider .swiper-button-prev',
	},
	pagination: {
		el: '.slider-swiper .swiper-pagination',
		type: 'bullets',
		clickable: true,
	},
})

var swiper = new Swiper('.gallery-swiper', {
	slidesPerView: 'auto',
	spaceBetween: 10,
	freeMode: true,
	navigation: false,
	scrollbar: {
		el: '.gallery-swiper .swiper-scrollbar',
		draggable: true,
	},
})

/*=============== tabs ===============*/
function tab(tab) {
	const tabBtns = tab.children

	tabBtns[0].classList.add('active')
	tab.parentElement
		.querySelector(`#tab-${tabBtns[0].dataset.tab}`)
		.classList.add('active')

	for (let btn of tabBtns) {
		btn.addEventListener('click', () => {
			for (let el of tabBtns) {
				el.classList.remove('active')
				tab.parentElement
					.querySelector(`#tab-${el.dataset.tab}`)
					.classList.remove('active')
			}
			tab.parentElement
				.querySelector(`#tab-${btn.dataset.tab}`)
				.classList.add('active')
			btn.classList.add('active')
		})
	}
}

const tabs = document.querySelectorAll('.tab')

if (tabs.length) {
	for (let t of tabs) {
		tab(t)
	}
}
