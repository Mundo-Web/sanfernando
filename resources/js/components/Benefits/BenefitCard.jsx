import React from "react"

const BenefitCard = ({ id, titulo, descripcionshort }) => {
  return <div
    className="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
    <div className="flex flex-col w-full text-white font-poppins_semibold">
      <h2 className="text-4xl text-left">{id}</h2>
      <h3 className="mt-5 text-2xl leading-7 mb-4">{titulo}</h3>
      <p>{descripcionshort}</p>
    </div>
  </div>
}

export default BenefitCard