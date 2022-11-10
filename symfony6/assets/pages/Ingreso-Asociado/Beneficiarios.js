//ES REFERENCIAS!!!!!!!!!!!!!!
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
  firstNameR: Yup.string().required('Debe ingresar su primer nombre'),
  secondNameR: Yup.string().notRequired(),
  thirdNameR: Yup.string().notRequired(),
  firstLastNameR: Yup.string().required('Debe ingresa su primer apellido'),
  secondLastNameR: Yup.string().required('Debe ingresa su segundo apellido'),
  marriedNameR: Yup.string().notRequired(),
  email: Yup.string()
    .email('Correo inválido')
    .required('Debe ingresar un correo'),
});

function Referencias() {
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
          firstNameR: '',
          secondNameR: '',
          thirdNameR: '',
          firstLastNameR: '',
          secondLastNameR: '',
          marriedNameR: '',
          phone: '',
          homePhone: '',
          email: '',
        }}
        validate={validate}
        validationSchema={validateSchema}
        onSubmit={submit}
      >
        {({ values, errors, handleChange, handleBlur }) => (
          <Form>
            <Divider>
              <Chip label='Ingreso de Referencias' />
            </Divider>
           
            <Grid
              container
              spacing={{ xs: 2, md: 3 }}
              columns={{ xs: 4, md: 12 }}
            >
              <Grid item xs={4} sm={4} md={4}>
                <TextFieldComp
                  name='firstNameR'
                  label='Primer Nombre'
                  value={values.firstNameR}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.firstNameR}
                />
                <TextFieldComp
                  name='secondNameR'
                  label='Segundo Nombre'
                  value={values.secondNameR}
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.secondNameR}
                />
                <TextFieldComp
                  name='thirdNameR'
                  label='Tercer Nombre'
                  value={values.thirdNameR}
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage=''
                />
              </Grid>
              <Grid item xs={4} sm={4} md={4}>
                <TextFieldComp
                  name='firstLastNameR'
                  label='Primer apellido'
                  value={values.firstLastNameR}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.firstLastNameR}
                />
                <TextFieldComp
                  name='secondLastNameR'
                  label='Segundo apellido'
                  value={values.secondLastNameR}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.secondLastNameR}
                />
                <TextFieldComp
                  name='marriedNameR'
                  label='Apellido de casada'
                  value={values.marriedNameR}
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
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.email}
                />
              </Grid>
            </Grid>

            
             <Grid
              container
              spacing={{ xs: 2, md: 3 }}
              columns={{ xs: 4, md: 12 }}
            >
            <Grid item xs={4} sm={4} md={4}>
            <Button type='submit' variant='contained' sx={{ mt: 5 }} >
              Guardar Referencia Personal
              </Button>
            </Grid>
            <Grid item xs={4} sm={4} md={4}>
             
             <Button type='submit' variant='contained' sx={{ mt: 5 }} >
              Guardar Referencia Familiar
             </Button>
            </Grid>
           
            </Grid>
             
             <Divider>
            <Chip label='Referencias Personales' />
            </Divider>
  
                 <table>
             <tbody>
            <tr>
            <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Tercer Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Apellido de casada</th>
                <th>Celular</th>  
                <th>Telefono fijo</th> 
                <th>Email</th>  
            </tr>
        </tbody>
    </table>
           
            <Divider>
            <Chip label='Referencias Familiares' />
            </Divider>
            <table>
       <tbody>
       <tr>
            <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Tercer Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Apellido de casada</th>
                <th>Celular</th>  
                <th>Telefono fijo</th> 
                <th>Email</th>  
            </tr>
        </tbody>
    </table>


          </Form>
        )}
      </Formik>
    </React.Fragment>
  );
}

export default Referencias;





