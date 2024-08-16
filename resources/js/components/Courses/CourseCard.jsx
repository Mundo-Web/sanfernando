import React from "react"

const CourseCard = ({ imagen, producto, extract, hasShadow = false, ...props }) => {
  return <button className={`w-full max-w-sm relative inline-flex items-center text-sm text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400 bg-white px-4 py-3 rounded-md ${hasShadow && 'shadow-md'}`} {...props}>
    <div className="flex-shrink-0">
      <img className="rounded-md w-11 h-11" src={`/${imagen}`} onError={e => e.target.src = '/images/img/noimagen.jpg'} alt={producto} />
    </div>
    <div className="w-full ps-3 text-start">
      <h4 className='w-[calc(100%-40px)] font-semibold text-ellipsis text-nowrap overflow-hidden '>{producto}</h4>
      <div className="text-gray-500 text-xs mb-1.5 dark:text-gray-400">
        {extract}
      </div>
    </div>
  </button>
}

export default CourseCard