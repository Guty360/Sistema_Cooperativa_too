//export default ActividadEconomica;

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

import * as Yup from 'yup';
import { isEmpleado, isEmpresario, alquila } from '../../data/datos';
import Select from 'react-select';

import SelectCountries from '../../components/SelectCountries';
//import { jsPDF } from "jspdf";

import { CheckBox } from '@mui/icons-material';
 
//Método envio de datos
const validate = (value) => {
  const error = {};
  if (value.country == 'SV') {
    if (!value.phone) error.phone = 'Debe ingresar un número de celular';
    else if (!numberPhone.test(value.phone))
      error.phone = 'Debe ingresa número válido';
  }
};
const validateSchema = Yup.object().shape({
  isEmpleado: Yup.string().required('¿Es Empleado?'),
  isEmpresario: Yup.string().required('¿Es Empresario?'),

  profesionple: Yup.string().required('Debe ingresar su Profesión u Oficio'),
  salariople: Yup.string().required('Debe ingresar su Salario'),
  constanciaple: Yup.string().required('Debe ingresar una constancia de salario en formato .pdf'),
  rubrople: Yup.string().required('Debe ingresar su rubro de trabajo'),

  profesionpre: Yup.string().required('Debe ingresar su Profesión u Oficio'),
  salariopre: Yup.string().required('Debe ingresar su Salario'),
  constanciapre: Yup.string().required('Debe ingresar una constancia de salario en formato .pdf'),
  rubropre: Yup.string().required('Debe ingresar su rubro de trabajo'),
  
  nnombreComercial: Yup.string().required('Ingrese el Nombre Comercial de su Negocio'),
  nnombreLegal: Yup.string().required('Ingrese el Nombre Legal de su Negocio'),
  tel: Yup.string().required('Debe ingresar un número de teléfono valido'),
  email: Yup.string()
    .email('Correo inválido')
    .required('Debe ingresar un correo'),
    paisl: Yup.string().required('Ingrese los datos de ubicación de su local'),
    regionl: Yup.string().required('Ingrese los datos de ubicación de su local'),
    subregionl: Yup.string().required('Ingrese los datos de ubicación de su local'),
    barrio: Yup.string().required('Ingrese el Barrio, Colonia o Residencia donde se ubica su negocio'),
    calle: Yup.string().required('Ingrese el Calle o Pasaje donde se ubica su negocio'),
    numerolocal: Yup.string().required('Ingrese el número de Local o Apartamento donde se ubica su negocio'),
    alquila: Yup.string().required('¿Alquila su local?'),

    gfijos: Yup.string().required('Ingrese sus gastos fijos'),
    gpersonales: Yup.string().required('Ingrese sus gastos personales'),
    capacidaddeAhorro: Yup.string().required('Ingrese su capacidad de ahorro'),

    otrosingresos: Yup.string().notRequired(),
    gEducacion: Yup.string().notRequired(),
    gcreditos: Yup.string().notRequired(),
    gmedicos: Yup.string().notRequired(),
});

function ActividadEconomica() {
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
          isEmpleado: '',
          isEmpresario: '',
          profesionple: '',
          salariople: '',
          rubrople: '',
          constanciapre: '',
          profesionpre: '',
          salariopre: '',
          rubropre: '',
          constanciapre: '',
          nnombreLegal: '',
          nnombreComercial: '',
          email: '',
          tel: '',
          otrosingresos: '',
          gfijos: '',
          gpersonales: '',
          gcreditos: '',
          gEducacion: '',
          gmedicos: '',
          capacidaddeAhorro: '',
          barrio: '',
          numerolocal: '',
          calle: '',
          alquila: '',
          paisl: 'El Salvador',
          regionl: '',
          subregionl: '',
        }}
        validate={validate}
        validationSchema={validateSchema}
        onSubmit={submit}
      >
        {({ values, errors, handleChange, handleBlur }) => (
         <Form>
            <Divider>
              <Chip label= 'Actividad Económica' />
            </Divider>
           
            <Grid
              container
              spacing={{ xs: 2, md: 3 }}
              columns={{ xs: 4, md: 12 }}
            >
              <Grid item xs={4} sm={4} md={6}>
              <TextField
             id='isEmpleado'
             name='isEmpleado'
             margin='normal'
             required
             select
             fullWidth
             label='Empleado'
             autoComplete='isEmpleado'
             value={values.isEmpleado}
             onChange={handleChange}
             onBlur={handleBlur}
                >
                  {isEmpleado.map((option) => (
                    <MenuItem key={option.value} value={option.value}>
                      {option.label}
                    </MenuItem>
                  ))}
              </TextField>
              </Grid>
              <Grid item xs={4} sm={4} md={6}>
              <TextField
             id='isEmpresario'
             name='isEmpresario'
             margin='normal'
             required
             select
             fullWidth
             label='Empresario'
             autoComplete='isEmpresario'
             value={values.isEmpresario}
             onChange={handleChange}
             onBlur={handleBlur}
                >
                  {isEmpresario.map((option) => (
                    <MenuItem key={option.value} value={option.value}>
                      {option.label}
                    </MenuItem>
                  ))}
              </TextField>
              </Grid> 
              </Grid>


              {values.isEmpleado === 'TRUE' ? (
              <>
                <Divider><Chip label='Información Requerida para Empleados' /></Divider>
                <Grid
                  container
                  spacing={{ xs: 2, md: 3 }}
                  columns={{ xs: 4, md: 12 }}
                >
                  <Grid item xs={4} sm={4} md={4}>
                    <TextFieldComp
                      name='profesionple'
                      label='Profesión/Oficio'
                      value={values.profesionple}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.profesionple}
                    />
                  </Grid>
                  <Grid item xs={4} sm={4} md={4}>
                  <TextFieldComp
                      name='rubrople'
                      label='Rubro actividad económica'
                      value={values.rubrople}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.rubrople}
                    />
                  </Grid>
                  <Grid item xs={4} sm={4} md={4}>
                      <TextFieldComp
                      name='salariople'
                      label='Salario'
                      value={values.salariople}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.salariople}
                    />
                  </Grid>
                </Grid>
              </>
            ) : null}


{values.isEmpresario === 'TRUE' ? (
              <>
                <Divider sx={{ mt: 3, mb: 1 }}>
                  <Chip label='Información Requerida para Empresarios' />
                  </Divider>
                <Grid
                  container
                  spacing={{ xs: 2, md: 3 }}
                  columns={{ xs: 4, md: 12 }}
                >
                  <Grid item xs={4} sm={4} md={4}>
                    <TextFieldComp
                      name='profesionpre'
                      label='Profesión/Oficio'
                      value={values.profesionpre}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.profesionpre}
                    />
                  </Grid>
                  <Grid item xs={4} sm={4} md={4}>
                  <TextFieldComp
                      name='rubropre'
                      label='Rubro actividad económica'
                      value={values.rubropre}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.rubropre}
                    />
                  </Grid>
                  <Grid item xs={4} sm={4} md={4}>
                      <TextFieldComp
                      name='salariopre'
                      label='Salario'
                      value={values.salariopre}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.salariopre}
                    />
                  </Grid>
                </Grid>
                
                <Divider sx={{ mt: 5 }}>
                  <Chip label='Negocio' />
                </Divider>

                <Grid
                  container
                  spacing={{ xs: 2, md: 3 }}
                  columns={{ xs: 4, md: 12 }}
                >
                  <Grid item xs={4} sm={4} md={6}>
                    <TextFieldComp
                      name='nnombreLegal'
                      label='Nombre Legal'
                      value={values.nnombreLegal}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.nnombreLegal}
                    />
                      <TextFieldComp
                      name='tel'
                      label='Teléfono'
                      value={values.tel}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.tel}
                    />
                  </Grid>
 
                  <Grid item xs={4} sm={4} md={6}>
                      <TextFieldComp
                      name='nnombreComercial'
                      label='Nombre Comercial'
                      value={values.nnombreComercial}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.nnombreComercial}
                    />
                       <TextFieldComp
                      name='email'
                      label='Correo'
                      value={values.email}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.email}
                    />
                  </Grid>
                </Grid>

                
                <Divider>
                <Chip label='Información de Local' />
                </Divider>
       
                <Grid
                  container
                  spacing={{ xs: 2, md: 3 }}
                  columns={{ xs: 4, md: 12 }}
                >
                  <Grid item xs={4} sm={4} md={4}>
                  <TextFieldComp
                      name='paisl'
                      label='Pais'
                      value={values.paisl}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.paisl}
                    />
                    </Grid>
                    <Grid item xs={4} sm={4} md={4}>
                      <TextFieldComp
                      name='regionl'
                      label='Region'
                      value={values.regionl}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.regionl}
                    />
                    </Grid>
                    <Grid item xs={4} sm={4} md={4}>
                      <TextFieldComp
                      name='subregionl'
                      label='Subregion'
                      value={values.subregionl}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.subregionl}
                    />
                  </Grid>
                  <Grid item xs={4} sm={4} md={6}>
                    <TextFieldComp
                      name='barrio'
                      label='Barrio\Colonia\Residencia'
                      value={values.barrio}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.barrio}
                    />
                      <TextFieldComp
                      name='numerolocal'
                      label='Número Local\Apartamento'
                      value={values.numerolocal}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.numerolocal}
                    />
                  </Grid>
 
                  <Grid item xs={4} sm={4} md={6}>
                      <TextFieldComp
                      name='calle'
                      label='Calle\Pasaje'
                      value={values.calle}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.calle}
                    />

                       <TextField
                       id='alquila'
                       name='alquila'
                       margin='normal'
                       required
                       select
                       fullWidth
                       label='¿Alquila?'
                       autoComplete='alquila'
                       value={values.alquila}
                       onChange={handleChange}
                       onBlur={handleBlur}
                      >
                      {alquila.map((option) => (
                        <MenuItem key={option.value} value={option.value}>
                          {option.label}
                        </MenuItem>
                      ))}
                  </TextField>
                  </Grid>
                </Grid>
              
              </>

            ) : null}

<Divider sx={{ mt: 5 }}>
                  <Chip label='Estudio Socioeconómico' />
                </Divider>
                <Grid
                  container
                  spacing={{ xs: 2, md: 3 }}
                  columns={{ xs: 4, md: 12 }}
                >
                  <Grid item xs={4} sm={4} md={6}>
                    <TextFieldComp
                      name='otrosingresos'
                      label='Otros Ingresos'
                      value={values.otrosingresos}
                      isRequired={false}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.otrosingresos}
                    />
                      <TextFieldComp
                      name='gfijos'
                      label='Gastos Fijos'
                      value={values.gfijos}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.gfijos}
                    />
                    <TextFieldComp
                      name='gpersonales'
                      label='Gastos Personales'
                      value={values.gpersonales}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.gpersonales}
                    />
                       <TextFieldComp
                      name='capacidaddeAhorro'
                      label='Capacidad de Ahorro'
                      value={values.capacidaddeAhorro}
                      isRequired={true}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.capacidaddeAhorro}
                    />
                  </Grid>
 
                  <Grid item xs={4} sm={4} md={6}>
            
                      <TextFieldComp
                      name='gcreditos'
                      label='Gastos por Créditos'
                      value={values.gcreditos}
                      isRequired={false}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.gcreditos}
                    />
                     <TextFieldComp
                      name='gEducacion'
                      label='Gastos en Educación'
                      value={values.gEducacion}
                      isRequired={false}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.gEducacion}
                    />
                     <TextFieldComp
                      name='gmedicos'
                      label='Gastos Médicos'
                      value={values.gmedicos}
                      isRequired={false}
                      handleChange={handleChange}
                      handleBlur={handleBlur}
                      errorMessage={errors.gmedicos}
                    />
                  </Grid>
                
                </Grid>
            
          </Form>
        )}
      </Formik>
    </React.Fragment>
  );
}
export default ActividadEconomica;
