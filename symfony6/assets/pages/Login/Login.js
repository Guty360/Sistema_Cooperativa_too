import React, { useState } from 'react';
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
import { reEmail } from '../../utilities/regularExpression';
import { urlApi } from '../../utilities/url';
import { useAuth } from '../../Context/AuthContext';
import { useNavigate } from 'react-router-dom';

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
const validate = (value) => {
  const error = {};

  // Validacion correo
  if (!value.email) {
    error.email = 'Debes ingresar un correo';
  } else if (!reEmail.test(value.email)) {
    error.email = 'El correo en inválido';
  }

  // Validacion password
  if (!value.password) error.password = 'Debes ingresar una contraseña';
  return error;
};

export default function Login() {
  //Designar el loggeo del usuario
  const { user } = useAuth();
  //Redireccionar al usuario
  const navigate = useNavigate();
  const [error, setError] = useState();

  const submit = (value, { resetForm }) => {
    resetForm();
    setError('');
    axios
      .post(`${urlApi}/login`, {
        username: value.email,
        password: value.password,
      })
      .then((response) => {
        if (response.status == '200') {
          user.login = true;
          navigate('/');
        }
      })
      .catch(function (error) {
        if (error.code === 'ERR_BAD_REQUEST')
          setError('Correo y/o contraseña incorrecta');
        else setError(error.code);
      });
  };

  return (
    <React.Fragment>
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

            <Typography component='h1' variant='h4' sx={{ color: '#ff7334' }}>
              Iniciar Sesión
            </Typography>
            {error && <p>{error}</p>}
            <Formik
              initialValues={{
                email: '',
                password: '',
              }}
              validate={validate}
              onSubmit={submit}
            >
              {({ values, errors, handleChange, handleBlur }) => (
                <Form noValidate sx={{ mt: 1 }}>
                  <TextField
                    id='email'
                    name='email'
                    margin='normal'
                    required
                    fullWidth
                    label='Correo electronico'
                    autoComplete='email'
                    autoFocus
                    value={values.email}
                    onChange={handleChange}
                    onBlur={handleBlur}
                    sx={{ mb: 0 }}
                  />
                  <ErrorMessage
                    name='email'
                    component={() => <AlertComp text={errors.email} />}
                  />
                  <TextField
                    id='password'
                    name='password'
                    margin='normal'
                    required
                    fullWidth
                    label='Password'
                    autoComplete='password'
                    type='password'
                    value={values.password}
                    onChange={handleChange}
                    onBlur={handleBlur}
                    sx={{ mb: 0 }}
                  />
                  <ErrorMessage
                    name='password'
                    component={() => <AlertComp text={errors.password} />}
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
                    Sign In
                  </Button>
                  <Grid container>
                    <Grid item xs>
                      <Link href='/forgot' variant='body2' color='#16382c'>
                        ¿Olvidaste la contraseña?
                      </Link>
                    </Grid>
                    <Grid item>
                      <Link href='/registro' variant='body2' color='#16382c'>
                        {'¿No tienes una cuenta? Registrate'}
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
