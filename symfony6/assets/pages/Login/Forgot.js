import React, { useState } from 'react';
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
import { Handshake } from '@mui/icons-material';
import { createTheme, ThemeProvider } from '@mui/material/styles';
import ButtonComp from '../../components/Button';
import axios from 'axios';
import { urlApi } from '../../utilities/url';
import { Formik, Form, ErrorMessage } from 'formik';
import { reEmail } from '../../utilities/regularExpression';
import AlertComp from '../../components/Alert';

function Copyright(props) {
  return (
    <Typography
      variant='body2'
      color='text.secondary'
      align='center'
      {...props}
    >
      {'Copyright © '}
      <Link color='inherit' href='/'>
        Cooperativa
      </Link>{' '}
      {new Date().getFullYear()}
      {'.'}
    </Typography>
  );
}

const theme = createTheme();

export default function Forgot() {
  const validate = (value) => {
    const error = {};

    // Validacion correo
    if (!value.email) {
      error.email = 'Debes ingresar un correo';
    } else if (!reEmail.test(value.email)) {
      error.email = 'El correo en inválido';
    }
  };
  const [error, setError] = useState('');
  const submit = (value, { resetForm }) => {
    resetForm();
    setError('');
    console.log(value.email);
    axios
      .post(`${urlApi}/olvida`, {
        email1: value.email,
      })
      .then((response) => {
        if (response.status == '200') {
          alert(`Enviamos un código a ${value.email} verifique`);
        }
      })
      .catch(function (error) {
        setError(error.message);
      });
  };

  return (
    <ThemeProvider theme={theme}>
      <Container component='main' maxWidth='xs' sx={{ marginTop: 25 }}>
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
          <Typography
            component='h1'
            variant='h4'
            sx={{ color: '#ff7334' }}
            align='center'
          >
            Recuperar tu contraseña
          </Typography>
          <Typography
            component='p'
            variant='body1'
            align='justify'
            sx={{ color: '#16382c', fontWeight: '405' }}
          >
            Ingresa tu correo para recibir un código de recuperación de
            contraseña
          </Typography>
          {error && <p>{error}</p>}
          <Formik
            initialValues={{
              email: '',
            }}
            validate={validate}
            onSubmit={submit}
          >
            {({ values, errors, handleChange, handleBlur }) => (
              <Form>
                <Box noValidate sx={{ mt: 1 }}>
                  <TextField
                    id='email'
                    name='email'
                    margin='normal'
                    required
                    fullWidth
                    value={values.email}
                    label='Ingresa correo electrónico'
                    autoComplete='email'
                    autoFocus
                    onChange={handleChange}
                    onBlur={handleBlur}
                    sx={{ width: '40ch' }}
                  />
                  <ErrorMessage
                    name='email'
                    component={() => <AlertComp text={errors.email} />}
                  />
                  <Grid container spacing={2}>
                    <Grid item sx={{ marginRight: 1 }}>
                      <Button
                        className='boton-ingreso'
                        type='submit'
                        width='xs'
                        variant='contained'
                        color='error'
                        href='/login'
                        sx={{
                          marginTop: 3.01,
                          marginBottom: 2,
                          marginLeft: 5,
                          height: 41,
                        }}
                      >
                        Cancelar
                      </Button>
                    </Grid>
                    <Grid
                      item
                      sx={{
                        marginTop: 0.5,
                      }}
                    >
                      <ButtonComp text='ENVIAR'></ButtonComp>
                    </Grid>
                  </Grid>
                </Box>
              </Form>
            )}
          </Formik>
        </Box>
        <Copyright sx={{ mt: 8, mb: 4 }} />
      </Container>
    </ThemeProvider>
  );
}
