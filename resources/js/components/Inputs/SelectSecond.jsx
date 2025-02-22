import React, { useEffect, useRef } from 'react';
import Select from 'react-select'

const customStyles = {
  control: (provided, state) => ({
    ...provided,
    backgroundColor: '#f0f1f2', // Color de fondo
    borderRadius: '12px',
    width: '200px',
    borderColor: state.isFocused ? '#221F1F' : '#F9FAFB', // Color de borde
    boxShadow: state.isFocused ? '0 0 0 1px #221F1F' : 'none',
    '&:hover': {
      borderColor: '#221F1F',
    },
    minHeight: '48px', // Altura mínima del select

  }),
  option: (provided, state) => ({
    ...provided,
    color: state.isSelected ? '#FFFFFF' : '#221F1F', // Color de texto
    paddingTop: '13px',
    paddingBottom: '13px',
    backgroundColor: state.isSelected ? '#221F1F' : '#F9FAFB', // Color de fondo
    '&:hover': {
      backgroundColor: state.isSelected ? '#221F1F' : '#FDE8E8',
      color: state.isSelected ? '#FFFFFF' : '#221F1F',
    },
    padding: '10px 20px', // Espaciado interno de las opciones
  }),
  menu: (provided) => ({
    ...provided,
    marginTop: '0px',
    padding: '0px',
    borderRadius: '12px',
  }),
  dropdownIndicator: (provided) => ({
    ...provided,
    color: '#221F1F',
    '&:hover': {
      color: '#221F1F',
    },
  }),
  indicatorSeparator: () => ({
    display: 'none',
  }),
  singleValue: (provided) => ({
    ...provided,
    color: '#221F1F', // Color del texto seleccionado
  }),
  placeholder: (provided) => ({
    ...provided,
    color: '#221F1F', // Color del placeholder
    fontWeight: 'bold', // Peso de la fuente
    fontSize: '16px', // Tamaño de la fuente
  }),
};



const SelectSecond = ({ title, handleOptionChange, options}) => {
 
  return (
    <Select className='font-Montserrat_Regular font-bold selectancho'
      
      styles={customStyles}
      options={options}
      placeholder={title}
      isSearchable={false}
      onChange={handleOptionChange}
    />
  );

};

export default SelectSecond;
