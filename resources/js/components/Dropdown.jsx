import React, { useState } from 'react';

const Dropdown = ({ items }) => {
  const [iscategoriaVisible, setIscategoriaVisible] = useState
  const toggleCattVisibility = () => {
    setIscategoriaVisible(!iscategoriaVisible)
  }
  return (
    <div className="dropdown w-full order-2 md:order-4">
      <div
        className="input-box focus:outline-none font-bold text-text16 md:text-text20 mr-20 shadow-md px-4 py-2 bg-[#F5F5F5]"
        onClick={toggleCattVisibility}
      >
        {CatSelected ? CatSelected : 'Categoria'}
      </div>

      {iscategoriaVisible && (
        <div className="list z-[100] animate-fade-down animate-duration-[2000ms] overflow-y-auto" style={{ maxHeight: '150px', boxShadow: 'rgba(0, 0, 0, 0.15) 0px 1px 2px 0px, rgba(0, 0, 0, 0.1) 0px 1px 3px 1px' }}>
          {items.map((item, index) => (

            <div className="w-full">
              <input

                type="radio" name="drop1" id={item.id} className="radio" value="price_high" onChange={handlecatChange} />
              <label
                ref={(el) => (labelCat.current[item.id] = el)}
                htmlFor={item.id}
                className="font-regularDisplay text-text20 hover:font-bold md:duration-100 hover:text-white ordenar"
              >
                <span className="name inline-block w-full">{item.name}</span>
              </label>
            </div>
          ))}



        </div>
      )}
    </div>
  )
}
export default Dropdown