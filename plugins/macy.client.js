import Macy from 'macy'

function initMacy() {
  const macy = Macy({
    container: '.image-mansonary',
    trueOrder: false,
    waitForImages: true,
    margin: 24,
    columns: 2,
    breakAt: {
      1200: 2,
      940: 1,
      520: 1,
      400: 1,
    },
  })
  console.log(macy)
}

export default ({ app }, inject) => {
  inject('initMacy', initMacy)
}