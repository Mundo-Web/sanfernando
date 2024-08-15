import React, { useEffect, useRef } from 'react';
import Select from 'react-select'

const customStyles = {
  control: (provided, state) => ({
    ...provided,
    backgroundColor: '#F9FAFB', // Color de fondo
    borderRadius: '12px',
    width: '200px',
    borderColor: state.isFocused ? '#EA1D2C' : '#F9FAFB', // Color de borde
    boxShadow: state.isFocused ? '0 0 0 1px #EA1D2C' : 'none',
    '&:hover': {
      borderColor: '#EA1D2C',
    },
    minHeight: '48px', // Altura mínima del select

  }),
  option: (provided, state) => ({
    ...provided,
    color: state.isSelected ? '#FFFFFF' : '#EA1D2C', // Color de texto
    paddingTop: '13px',
    paddingBottom: '13px',
    backgroundColor: state.isSelected ? '#EA1D2C' : '#F9FAFB', // Color de fondo
    '&:hover': {
      backgroundColor: state.isSelected ? '#EA1D2C' : '#FDE8E8',
      color: state.isSelected ? '#FFFFFF' : '#EA1D2C',
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
    color: '#EA1D2C',
    '&:hover': {
      color: '#EA1D2C',
    },
  }),
  indicatorSeparator: () => ({
    display: 'none',
  }),
  singleValue: (provided) => ({
    ...provided,
    color: '#EA1D2C', // Color del texto seleccionado
  }),
  placeholder: (provided) => ({
    ...provided,
    color: '#EA1D2C', // Color del placeholder
    fontWeight: 'bold', // Peso de la fuente
    fontSize: '16px', // Tamaño de la fuente
  }),
};



const options = [
  { value: 'mas_valorado', label: 'Mas valorado' },
  { value: 'mas_comprado', label: 'Mas comprado' },

]

const SelectSecond = ({ title }) => {

  return (
    <Select className='font-poppins_regular font-bold'
      styles={customStyles}
      options={options}
      placeholder={title}
    />
  );

};

export default SelectSecond;
