import React, { useEffect, useState } from 'react';
import { TextField, MenuItem } from '@mui/material';
import axios from 'axios';

function SelectCountries({ name, value, handleChange, handleBlur }) {
  const [countries, setCountries] = useState([]);

  useEffect(() => {
    axios
      .get('https://trial.mobiscroll.com/content/countries.json')
      .then((response) => {
        const { data } = response;
        const countriesArray = [];
        for (let i = 0; i < data.length; i++) {
          countriesArray.push({ value: data[i].value, label: data[i].text });
        }
        setCountries(countriesArray);
      });
  }, []);
  return (
    <>
      <TextField
        id={name}
        name={name}
        required
        select
        fullWidth
        label='País de nacimiento'
        autoComplete='country'
        value={value}
        onChange={handleChange}
        onBlur={handleBlur}
        sx={{ mb: 3 }}
      >
        {countries.map((option) => (
          <MenuItem key={option.value} value={option.value}>
            {option.label}
          </MenuItem>
        ))}
      </TextField>
    </>
  );
}

export default SelectCountries;
