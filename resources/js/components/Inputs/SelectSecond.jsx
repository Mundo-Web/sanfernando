import React, { useEffect, useRef } from 'react';
import $ from 'jquery';
import 'select2/dist/css/select2.min.css';
import 'select2/dist/js/select2.full.min.js';

const SelectSecond = ({ title }) => {
  const selectRef = useRef(null);

  useEffect(() => {
    const $select = $(selectRef.current);

    $select.select2({
      placeholder: '¿Cómo nos encontraste?',
      minimumResultsForSearch: Infinity,
      templateSelection: function(data, container) {
        // Añadir estilos personalizados a la opción seleccionada
        $(container).addClass("");
        return data.text;
      }
    });

    // Limpiar la instancia de select2 cuando el componente se desmonte
    return () => {
      $select.select2('destroy');
    };
  }, []);

  return (
    <select
      ref={selectRef}
      className="selectsecond flex gap-2.5 items-center self-stretch px-4 py-3 my-auto text-base leading-tight text-red-600 whitespace-nowrap bg-rose-50 rounded-xl"
    >
      <option value="">{title}</option>
      {/* Agrega más opciones aquí si es necesario */}
    </select>
  );
};

export default SelectComponent;
