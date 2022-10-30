import React from 'react';
import Select from 'react-select';
import { asociacionesCooperativas } from '../data/Cooperativas';

export default function SelectAsociaciones({ name, handleBlur }) {
  return (
    <>
      <Select
        id={name}
        name={name}
        onBlur={handleBlur}
        className='basic-single'
        classNamePrefix='select'
        isSearchable={true}
        isMulti
        placeholder='Otras asociaciones a las que pertenesca'
        options={asociacionesCooperativas}
      />
    </>
  );
}
