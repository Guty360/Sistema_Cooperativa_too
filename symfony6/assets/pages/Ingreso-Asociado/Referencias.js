
//ES BENEFICIARIOS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

import React, { useState, forwardRef } from 'react';
import { Formik, Form, ErrorMessage } from 'formik';
import {
  
  Button,
  Container,
  Chip,
  Divider,
  Grid,
  TextField,
} from '@mui/material';
import TextFieldComp from '../../components/TextField';
import AlertComp from '../../components/Alert';
import {
  numberPhone,
  expresitionDate,
} from '../../utilities/regularExpression';
import * as Yup from 'yup';
import {
  TextMaskDate,
} from '../../utilities/mask';
import calculeteAge from '../../utilities/calculateAge';
import { borderRadius } from '@mui/system';

const validate = (value) => {
  const error = {};
};

const validateSchema = Yup.object().shape({
  firstNameB: Yup.string().required('Debe ingresar el primer nombre del beneficiario'),
  secondNameB: Yup.string().notRequired(),
  thirdNameB: Yup.string().notRequired(),
  firstLastNameB: Yup.string().required('Debe ingresar el primer apellido del beneficiario'),
  secondLastNameB: Yup.string().required('Debe ingresar el segundo apellido del beneficiario'),
  marriedNameB: Yup.string().notRequired(),

  dateBirthb: Yup.string()
    .required('Debe ingresar la fecha de nacimiento del beneficiario')
    .max(10, 'Máximo 10 caracteres'),
 
    parentescoB: Yup.string().required('Debe ingresar su parentesco con del beneficiario'),
    porcentajeB: Yup.string().required('Debe ingresar el porcentaje asignado al beneficiario'),
});

function Beneficiarios() {
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
          firstNameB: '',
          secondNameB: '',
          thirdNameB: '',
          firstLastNameB: '',
          secondLastNameB: '',
          marriedNameB: '',
          age: '',
          porcentajeB: '',
          parentescoB: '',
          dateBirthb: '',
    
        }}
        validate={validate}
        validationSchema={validateSchema}
        onSubmit={submit}
      >
       
            {({ values, errors, handleChange, handleBlur }) => (
          <Form>
            <Divider>
              <Chip label='Asignación de Beneficiarios' />
            </Divider>
         
            <Grid
              container
              spacing={{ xs: 2, md: 3 }}
              columns={{ xs: 4, md: 12 }}
            >
              <Grid item xs={4} sm={4} md={4}>
                <TextFieldComp
                  name='firstNameB'
                  label='Primer Nombre'
                  value={values.firstNameB}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.firstNameB}
                />
                <TextFieldComp
                  name='secondNameB'
                  label='Segundo Nombre'
                  value={values.secondNameB}
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.secondNameB}
                />
                <TextFieldComp
                  name='thirdNameB'
                  label='Tercer Nombre'
                  value={values.thirdNameB}
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage=''
                />
              </Grid>
              <Grid item xs={4} sm={4} md={4}>
                <TextFieldComp
                  name='firstLastNameB'
                  label='Primer apellido'
                  value={values.firstLastNameB}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.firstLastNameB}
                />
                <TextFieldComp
                  name='secondLastNameB'
                  label='Segundo apellido'
                  value={values.secondLastNameB}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.secondLastNameB}
                />
                <TextFieldComp
                  name='marriedNameB'
                  label='Apellido de casada'
                  value={values.marriedNameB}
                  isRequired={false}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage=''
                />
              </Grid>
              <Grid item xs={4} sm={4} md={4}>
                <TextFieldComp
                  name='parentescoB'
                  label='Parentesco'
                  value={values.parentescoB}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.parentescoB}
                />

                    <TextFieldComp
                    id='dateBirthb'
                    name='dateBirthb'
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
                    name='dateBirthb'
                    component={() => <AlertComp text={errors.dateBirthb} />}
                  />

                <TextFieldComp
                  name='porcentajeB'
                  label='Porcentaje Asignado'
                  value={values.porcentajeB}
                  isRequired={true}
                  handleChange={handleChange}
                  handleBlur={handleBlur}
                  errorMessage={errors.porcentajeB}
                />
              </Grid>
            </Grid>
           
           
             <Button type='submit' variant='contained' sx={{ mt: 5 }}>
              Guardar Beneficiario
             </Button>
         
          
            <Divider>
              <Chip label='Listado de Beneficiarios' />
            </Divider>
          

            <table>
        <thead>
            <tr>
            <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Tercer Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Apellido de casada</th>
                <th>Parentesco</th> 
                <th>Fecha de nacimiento</th>
                <th>Edad</th>
                <th>Porcentaje</th>   
            </tr>
            </thead>
       <tbody>
        </tbody>
    </table>
   

          </Form>
        )}
      </Formik>
    </React.Fragment>
  );
}

export default Beneficiarios;




