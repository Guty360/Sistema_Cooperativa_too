import React, { useState, forwardRef } from 'react';
import { Formik, Form, ErrorMessage } from 'formik';
import {
  Chip,
  Divider,
  Grid,
  Button,
  TextField,
  MenuItem,
} from '@mui/material';
import TextFieldComp from '../../components/TextField';
import AlertComp from '../../components/Alert';
import {
  numberPhone,
  expresitionDate,
} from '../../utilities/regularExpression';
import * as Yup from 'yup';
import { genero, estadoCivil } from '../../data/datos';
import Select from 'react-select';
import { asociacionesCooperativas } from '../../data/Cooperativas';
import SelectCountries from '../../components/SelectCountries';
import {
  TextMaskDUI,
  TextMaskDate,
  TextMaskISSS,
  TextMaskNUP,
  TextMaskNIT,
} from '../../utilities/mask';
import calculeteAge from '../../utilities/calculateAge';

//Método envio de datos
const validate = (value) => {
  const error = {};
  if (value.country == 'SV') {
    if (!value.phone) error.phone = 'Debe ingresar un número de celular';
    else if (!numberPhone.test(value.phone))
      error.phone = 'Debe ingresa número válido';
    if (value.homePhone !== '') {
      if (!numberPhone.test(value.homePhone))
        error.homePhone = 'Número fijo ingresado inválido';
    }
    if (!value.dui) error.dui = 'Debe ingresar el número de DUI';
  } else {
    if (!value.phone) error.phone = 'Debe ingresar un número de celular';
    else if (!numberPhone.test(value.phone))
      error.phone = 'Debe ingresa número válido';
    if (value.homePhone !== '') {
      if (!numberPhone.test(value.homePhone))
        error.homePhone = 'Número fijo ingresado inválido';
    }
  }
};
const validateSchema = Yup.object().shape({
  firstName: Yup.string().required('Debe ingresar su primer nombre'),
  secondName: Yup.string().required('Debe ingresar su segundo nombre'),
  thirdName: Yup.string().notRequired(),
  firstLastName: Yup.string().required('Debe ingresa su primer apellido'),
  secondLastName: Yup.string().required('Debe ingresa su segundo apellido'),
  marriedName: Yup.string().notRequired(),
  email: Yup.string()
    .email('Correo inválido')
    .required('Debe ingresar un correo'),
  gender: Yup.string().required('Debe seleccionar su género'),
  civilStatus: Yup.string().required('Debe seleccionar un estado civil'),
  dateBirth: Yup.string()
    .required('Debe ingresar su fecha de nacimiento')
    .max(10, 'Máximo 10 caracteres'),
  dui: Yup.string(),
});

function InformacionPersonal() {
  let arrayAsociation = [];
  const submit = (value, { resetForm }) => {
    value.asociation = arrayAsociation;
    value.age = calculeteAge(value.dateBirth);
    alert(JSON.stringify(value, null, 2));
    //resetForm(); //Limpia el formulario
  };
  const handleChangeAsociation = (selectedOption) => {
    const asociation = [];
    selectedOption.map((option) => {
      asociation.push(option.value);
    });
    arrayAsociation = asociation;
    console.log(asociation);
  };
  return (
    <React.Fragment>
      <Formik
        initialValues={{
          firstName: '',
          secondName: '',
          thirdName: '',
          firstLastName: '',
          secondLastName: '',
          marriedName: '',
          phone: '',
          homePhone: '',
          email: '',
          age: '',
          gender: '',
          civilStatus: '',
          dateBirth: '',
          country: 'SV',
          dui: '',
          nit: '',
          isss: '',
          nup: '',
          passport: '',
          asociation: [],
          fistNameCouple: '',
          secondNameCouple: '',
          thirdNameCouple: '',
          firstLastNameCouple: '',
          secondLastNameCouple: '',
          phoneCouple: '',
        }}
        validate={validate}
        validationSchema={validateSchema}
        onSubmit={submit}
      >
        {({ values, errors, handleChange, handleBlur }) => (
          <Form>
            <Divider>
              <Chip label='Datos personales' />
            </Divider>
            <Grid
              container
              spacing={{ xs: 2, md: 3 }}
              columns={{ xs: 4, md: 12 }}
            >
              <Grid item xs={4} sm={4} md={4}>
                <TextFieldComp
                  name='firstName'
                  label='Primer Nombre'
                  value={values.firstName}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.firstName}
                />
                <TextFieldComp
                  name='secondName'
                  label='Segundo Nombre'
                  value={values.secondName}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.secondName}
                />
                <TextFieldComp
                  name='thirdName'
                  label='Tercer Nombre'
                  value={values.thirdName}
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage=''
                />
              </Grid>
              <Grid item xs={4} sm={4} md={4}>
                <TextFieldComp
                  name='firstLastName'
                  label='Primer apellido'
                  value={values.firstLastName}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.firstLastName}
                />
                <TextFieldComp
                  name='secondLastName'
                  label='Segundo apellido'
                  value={values.secondLastName}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.secondLastName}
                />
                <TextFieldComp
                  name='marriedName'
                  label='Apellido de casada'
                  value={values.marriedName}
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage=''
                />
              </Grid>
              <Grid item xs={4} sm={4} md={4}>
                <TextFieldComp
                  name='phone'
                  label='Celular'
                  value={values.phone}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.phone}
                />

                <TextFieldComp
                  name='homePhone'
                  label='Telefono fijo'
                  value={values.homePhone}
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.homePhone}
                />
                <TextFieldComp
                  name='email'
                  label='Correo electrónico'
                  value={values.email}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.email}
                />
              </Grid>
            </Grid>
            <Divider sx={{ mt: 3, mb: 1 }}></Divider>
            <Grid
              container
              spacing={{ xs: 2, md: 3 }}
              columns={{ xs: 4, md: 12 }}
            >
              <Grid item xs={4} sm={4} md={6}>
                <TextField
                  id='gender'
                  name='gender'
                  margin='normal'
                  required
                  select
                  fullWidth
                  label='Genero'
                  autoComplete='gender'
                  value={values.gender}
                  onChange={handleChange}
                  onBlur={handleBlur}
                >
                  {genero.map((option) => (
                    <MenuItem key={option.value} value={option.value}>
                      {option.label}
                    </MenuItem>
                  ))}
                </TextField>
                <TextField
                  id='civilStatus'
                  name='civilStatus'
                  margin='normal'
                  required
                  select
                  fullWidth
                  label='Estado civil'
                  autoComplete='civilStatus'
                  value={values.civilStatus}
                  onChange={handleChange}
                  onBlur={handleBlur}
                >
                  {estadoCivil.map((option) => (
                    <MenuItem key={option.value} value={option.value}>
                      {option.label}
                    </MenuItem>
                  ))}
                </TextField>
              </Grid>
              <Grid item xs={4} sm={4} md={6} sx={{ mt: 2 }}>
                <SelectCountries
                  name='country'
                  value={values.country}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                ></SelectCountries>
                <>
                  <TextField
                    id='dateBirth'
                    name='dateBirth'
                    fullWidth
                    label='Fecha de nacimiento'
                    value={values.dateBirth}
                    onChange={handleChange}
                    onBlur={handleBlur}
                    placeholder='dd/mm/yyyy'
                    InputProps={{
                      inputComponent: TextMaskDate,
                    }}
                  />
                  <ErrorMessage
                    name='dateBirth'
                    component={() => <AlertComp text={errors.dateBirth} />}
                  />
                </>
              </Grid>
              <Grid item xs={4} sm={4} md={12}>
                {/* Select asociaciones*/}
                <Select
                  id='asociation'
                  name='asociation'
                  fullWidth
                  onChange={handleChangeAsociation}
                  onBlur={handleBlur}
                  className='basic-single'
                  classNamePrefix='select'
                  isSearchable={true}
                  isMulti
                  placeholder='Otras asociaciones a las que pertenesca'
                  options={asociacionesCooperativas}
                />
              </Grid>
            </Grid>
            {values.civilStatus === 'casado' ? (
              <>
                <Divider sx={{ mt: 5 }}>
                  <Chip label='Datos conyuge' />
                </Divider>
                <Grid
                  container
                  spacing={{ xs: 2, md: 3 }}
                  columns={{ xs: 4, md: 12 }}
                >
                  <Grid item xs={4} sm={4} md={6}>
                    <TextFieldComp
                      name='firstNameCouple'
                      label='Primer Nombre'
                      value={values.firstName}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.firstName}
                    />
                    <TextFieldComp
                      name='secondNameCouple'
                      label='Segundo Nombre'
                      value={values.secondName}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.secondName}
                    />
                    <TextFieldComp
                      name='thirdNameCouple'
                      label='Tercer Nombre'
                      value={values.thirdName}
                      isRequired={false}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage=''
                    />
                  </Grid>
                  <Grid item xs={4} sm={4} md={6}>
                    <TextFieldComp
                      name='firstLastNameCouple'
                      label='Primer apellido'
                      value={values.firstLastName}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.firstLastName}
                    />
                    <TextFieldComp
                      name='secondLastNameCouple'
                      label='Segundo apellido'
                      value={values.secondLastName}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.secondLastName}
                    />
                    <TextFieldComp
                      name='phoneCouple'
                      label='Celular'
                      value={values.marriedName}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage=''
                    />
                  </Grid>
                </Grid>
              </>
            ) : null}
            <Divider sx={{ mt: 5 }}>
              <Chip label='Documentos de identificación' />
            </Divider>
            {/* Caso de una persona salvadoreña */}
            {values.country === 'SV' ? (
              <>
                <Grid
                  container
                  spacing={{ xs: 2, md: 3 }}
                  columns={{ xs: 4, md: 12 }}
                >
                  <Grid item xs={4} sm={4} md={6}>
                    <TextField
                      id='dui'
                      name='dui'
                      fullWidth
                      label='DUI'
                      required
                      margin='normal'
                      value={values.dui}
                      onChange={handleChange}
                      onBlur={handleBlur}
                      InputProps={{
                        inputComponent: TextMaskDUI,
                      }}
                    />
                    <ErrorMessage
                      name='dui'
                      component={() => <AlertComp text={errors.dui} />}
                    />
                    <TextField
                      id='nit'
                      name='nit'
                      fullWidth
                      label='NIT'
                      required
                      margin='normal'
                      value={values.nit}
                      onChange={handleChange}
                      onBlur={handleBlur}
                      InputProps={{
                        inputComponent: TextMaskNIT,
                      }}
                      placeholder='0000-000000-000-0'
                    />
                    <ErrorMessage
                      name='nit'
                      component={() => <AlertComp text={errors.nit} />}
                    />
                  </Grid>
                  <Grid item xs={4} sm={4} md={6}>
                    <TextField
                      id='isss'
                      name='isss'
                      fullWidth
                      label='Número de ISSS'
                      required
                      margin='normal'
                      value={values.isss}
                      onChange={handleChange}
                      onBlur={handleBlur}
                      InputProps={{
                        inputComponent: TextMaskISSS,
                      }}
                      placeholder='000000000'
                    />
                    <ErrorMessage
                      name='isss'
                      component={() => <AlertComp text={errors.isss} />}
                    />
                    <TextField
                      id='nup'
                      name='nup'
                      fullWidth
                      label='NUP'
                      required
                      margin='normal'
                      value={values.nup}
                      onChange={handleChange}
                      onBlur={handleBlur}
                      InputProps={{
                        inputComponent: TextMaskNUP,
                      }}
                      placeholder='000000000000'
                    />
                    <ErrorMessage
                      name='nup'
                      component={() => <AlertComp text={errors.nup} />}
                    />
                  </Grid>
                </Grid>
              </>
            ) : (
              // Caso de una persona extranjera
              <>
                <Grid
                  container
                  spacing={{ xs: 2, md: 3 }}
                  columns={{ xs: 4, md: 12 }}
                >
                  <Grid item xs={4} sm={4} md={12}>
                    <TextField
                      id='passport'
                      name='passport'
                      label='Pasaporte\Carnet residente'
                      required
                      fullWidth
                      margin='normal'
                      value={values.passport}
                      onChange={handleChange}
                      onBlur={handleBlur}
                      InputProps={{
                        inputComponent: TextMaskNUP,
                      }}
                    />
                    <ErrorMessage
                      name='passport'
                      component={() => <AlertComp text={errors.passport} />}
                    />
                  </Grid>
                </Grid>
              </>
            )}
            <Button type='submit' variant='contained' sx={{ mt: 5 }}>
              boton provisional
            </Button>
          </Form>
        )}
      </Formik>
    </React.Fragment>
  );
}

export default InformacionPersonal;
