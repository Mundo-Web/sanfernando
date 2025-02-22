import React from "react"

const BenefitSlide = ({ icono, titulo, descripcionshort }) => {
  return <article className="flex flex-col gap-4 items-start min-w-[240px]">
    <img
      loading="lazy"
      src={`/${icono}`}
      className="object-contain shrink-0 w-10 aspect-square"
      alt={`Icono ${titulo}`}
      onError={e => e.target.src = '/images/academia/libro.png'}
    />
    <div className="flex flex-col">
      <h2 className="text-lg xl:text-xl font-Montserrat_SemiBold leading-tight xl:line-clamp-2 max-w-xs">{titulo}</h2>
      <p className="mt-2 text-base font-Montserrat_Regular leading-5">
        {descripcionshort}
      </p>
    </div>
  </article>
}

export default BenefitSlide