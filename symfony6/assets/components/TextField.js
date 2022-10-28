import React from 'react';
import { TextField } from '@mui/material';
import { ErrorMessage } from 'formik';
import AlertComp from '../components/Alert';

function TextFieldComp({
  name,
  label,
  value,
  isRequired,
  handleChange,
  handleBlur,
  errorMessage,
}) {
  return (
    <React.Fragment>
      {isRequired ? (
        <TextField
          id={name}
          name={name}
          margin='normal'
          required
          fullWidth
          label={label}
          autoComplete={name}
          value={value}
          onChange={handleChange}
          onBlur={handleBlur}
          sx={{ mb: 0 }}
        />
      ) : (
        <TextField
          id={name}
          name={name}
          margin='normal'
          fullWidth
          label={label}
          autoComplete={name}
          value={value}
          onChange={handleChange}
          onBlur={handleBlur}
          sx={{ mb: 0 }}
        />
      )}

      <ErrorMessage
        name={name}
        component={() => <AlertComp text={errorMessage} />}
      />
    </React.Fragment>
  );
}

export default TextFieldComp;
