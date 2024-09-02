import React from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from '../Utils/CreateReactScript'
import SignsRest from '../actions/SignsRest'

const signsRest = new SignsRest()

const Signs = ({ signs }) => {

  const correlatives = [
    'left-sign', 'middle-sign', 'right-sign'
  ]

  const onImageChange = (e, correlative) => {
    const file = e.target.files?.[0] ?? null
    if (!file) return
    const uri = URL.createObjectURL(file)
    $(`#previewer-${correlative}`).attr('src', uri)
  }

  const onFormSubmit = async (correlative) => {
    const formData = new FormData()
    formData.append('correlative', correlative)
    formData.append('sign', document.getElementById(`imagen-${correlative}`).files?.[0] ?? null)
    formData.append('name', $(`#name-${correlative}`).val())
    formData.append('occupation', $(`#occupation-${correlative}`).val())
    const result = await signsRest.save(formData)
    if (!result) return
    console.log(result)
  }

  return (<>
    <div className='flex flex-wrap gap-4 items-center justify-center min-h-[calc(100vh-65px)] p-4'>
      {
        correlatives.map(x => {
          const sign = signs.find(({ correlative }) => correlative == x)
          return <div class="max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <label htmlFor={`imagen-${x}`}>
              <img id={`previewer-${x}`} className='aspect-video rounded-md mb-4 object-cover object-center cursor-pointer' src={`/${sign?.sign_path}`} onError={e => e.target.src = '/images/img/noimagen.jpg'} />
              <input className='hidden' type="file" name={`imagen-${x}`} id={`imagen-${x}`} onChange={(e) => onImageChange(e, x)} />
            </label>

            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name={`name-${x}`} id={`name-${x}`} class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required defaultValue={sign?.name ?? ''} />
              <label for={`name-${x}`} class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name={`occupation-${x}`} id={`occupation-${x}`} class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required defaultValue={sign?.occupation} />
              <label for={`occupation-${x}`} class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cargo o posicion</label>
            </div>
            <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" onClick={() => onFormSubmit(x)}>
              <i className='fa fa-save me-1'></i>
              Guardar
            </button>
          </div>
        })
      }
    </div>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Signs {...properties} />);
})