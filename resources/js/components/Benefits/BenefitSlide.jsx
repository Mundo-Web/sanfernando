import React from "react"

const BenefitSlide = ({ icono, titulo, descripcionshort }) => {
  return <article className="flex gap-4 items-start min-w-[240px]">
    <img
      loading="lazy"
      src={`/${icono}`}
      className="object-contain shrink-0 w-10 aspect-square"
      alt={`Icono ${titulo}`}
      onError={e => e.target.src = '/images/img/nobenefit.png'}
    />
    <div className="flex flex-col">
      <h2 className="text-lg font-poppins_semibold leading-tight">{titulo}</h2>
      <p className="mt-2 text-base leading-5">
        {descripcionshort}
      </p>
    </div>
  </article>
}

export default BenefitSlide