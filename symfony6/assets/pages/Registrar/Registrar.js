import React from 'react';
import axios from 'axios';
import {
  Avatar,
  Button,
  CssBaseline,
  TextField,
  Link,
  Grid,
  Box,
  Typography,
  Container,
} from '@mui/material';
import { Handshake, Php } from '@mui/icons-material';
import { createTheme, ThemeProvider } from '@mui/material/styles';
import { Formik, Form, ErrorMessage } from 'formik';
import AlertComp from '../../components/Alert';
import { reEmail, numberPhone } from '../../utilities/regularExpression';

import { TextMaskDate } from '../../utilities/mask';

import { urlApi } from '../../utilities/url';
import { postLogin } from '../../services/login';
import Copyright from '../../components/Copytight';

const theme = createTheme();
const validate = (value) => {
  const error = {};

  // Validacion correo
  if (!value.email) {
    error.email = 'Debes ingresar un correo';
  } else if (!reEmail.test(value.email)) {
    error.email = 'El correo en inválido';
  }

  if (!value.nombres) error.nombres = 'Debes ingresar tu nombre';
  if (!value.apellidos) error.apellidos = 'Debes ingresar tu apellido';
  if (!value.fechaNac) error.fechaNac = 'Debes ingresar tu fecha de nacimiento';

  if (!value.tel) error.tel = 'Debes ingresar tu número de teléfono';
  else if (!numberPhone.test(value.tel))
    error.tel = 'El número de teléfono no es válido';

  return error;
};

const submit = (value, { resetForm }) => {
  //resetForm();
  axios
    .post(`${urlApi}/registro`, {
      username: value.email,
      name: value.nombres,
      lastName: value.apellidos,
      dateBirth: value.fechaNac,
      phone: value.tel,
    })
    .then((response) => {
      if (response.status == '200') alert('Credenciales enviadas');
    })
    .catch(function (error) {
      alert(error);
    });
};

export default function Registrar() {
  return (
    <React.Fragment>
      <ThemeProvider theme={theme}>
        <Container component='main' sx={{ marginTop: 15, width: 600 }}>
          <CssBaseline />
          <Box
            sx={{
              marginTop: 8,
              display: 'flex',
              flexDirection: 'column',
              alignItems: 'center',
            }}
          >
            <Link href='/' underline='none'>
              <Avatar sx={{ m: 1, bgcolor: '#16382c', width: 56, height: 56 }}>
                <Handshake href='/' />
              </Avatar>
            </Link>

            <Typography component='h1' variant='h4' sx={{ color: '#ff7334' }}>
              Registrate
            </Typography>
            <Formik
              initialValues={{
                nombres: '',
                apellidos: '',
                fechaNac: '',
                tel: '',
                email: '',
              }}
              validate={validate}
              onSubmit={submit}
            >
              {({ values, errors, handleChange, handleBlur }) => (
                <Form sx={{ mt: 1, width: 600 }}>
                  <Box
                    display='grid'
                    gridTemplateColumns='repeat(2, 1fr)'
                    gap={2}
                  >
                    <Box>
                      <TextField
                        id='nombres'
                        name='nombres'
                        margin='normal'
                        required
                        fullWidth
                        label='Nombres'
                        autoComplete='nombres'
                        type='text'
                        value={values.nombres}
                        onChange={handleChange}
                        onBlur={handleBlur}
                        sx={{ mb: 0 }}
                      />
                      <ErrorMessage
                        name='nombres'
                        component={() => <AlertComp text={errors.nombres} />}
                      />
                    </Box>

                    <Box>
                      <TextField
                        id='apellidos'
                        name='apellidos'
                        margin='normal'
                        required
                        fullWidth
                        label='Apellidos'
                        autoComplete='apellidos'
                        type='text'
                        value={values.apellidos}
                        onChange={handleChange}
                        onBlur={handleBlur}
                        sx={{ mb: 0 }}
                      />
                      <ErrorMessage
                        name='apellidos'
                        component={() => <AlertComp text={errors.apellidos} />}
                      />
                    </Box>

                    <Box>
                      <TextField
                        id='fechaNac'
                        name='fechaNac'
                        margin='normal'
                        required
                        fullWidth
                        label='Fecha de nacimiento'
                        value={values.fechaNac}
                        onChange={handleChange}
                        onBlur={handleBlur}
                        placeholder='dd/mm/yyyy'
                        sx={{ mb: 0 }}
                        InputProps={{
                          inputComponent: TextMaskDate,
                        }}
                      />
                      <ErrorMessage
                        name='fechaNac'
                        component={() => <AlertComp text={errors.fechaNac} />}
                      />
                    </Box>

                    <Box>
                      <TextField
                        id='tel'
                        name='tel'
                        margin='normal'
                        required
                        fullWidth
                        label='Teléfono'
                        autoComplete='tel'
                        inputMode='tel'
                        value={values.tel}
                        onChange={handleChange}
                        onBlur={handleBlur}
                        sx={{ mb: 0 }}
                      />
                      <ErrorMessage
                        name='tel'
                        component={() => <AlertComp text={errors.tel} />}
                      />
                    </Box>
                  </Box>

                  <TextField
                    id='email'
                    name='email'
                    margin='normal'
                    required
                    fullWidth
                    label='Correo electronico'
                    autoComplete='email'
                    value={values.email}
                    onChange={handleChange}
                    onBlur={handleBlur}
                    sx={{ mb: 0, width: 600 }}
                  />
                  <ErrorMessage
                    name='email'
                    component={() => <AlertComp text={errors.email} />}
                  />

                  <Button
                    className='boton-ingreso'
                    type='submit'
                    fullWidth
                    variant='contained'
                    id='boton1'
                    sx={{
                      marginTop: 3,
                      marginBottom: 2,
                      backgroundColor: '#ff7334',
                    }}
                  >
                    Registrarse
                  </Button>
                  <Grid container>
                    <Grid item>
                      <Link href='/login' variant='body2' color='#16382c'>
                        {'¿Ya tienes una cuenta? Inicia sesión'}
                      </Link>
                    </Grid>
                  </Grid>
                </Form>
              )}
            </Formik>
          </Box>
          <Copyright sx={{ mt: 8, mb: 4 }} />
        </Container>
      </ThemeProvider>
    </React.Fragment>
  );
}
