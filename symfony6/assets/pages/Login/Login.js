import React from 'react';
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
import { Formik, Form, ErrorMessage } from 'formik';
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
const validate = (value) => {
  const error = {};

  // Validacion correo
  if (!value.email) {
    error.email = 'Debes ingresar un correo';
  } else if (!reEmail.test(value.email)) {
    error.email = 'El correo en invalido';
  }

  // Validacion password
  if (!value.password) error.password = 'Debes ingresar una contraseña';
  return error;
};

const submit = (value, { resetForm }) => {
  resetForm();
  console.log(value);
};
const reEmail =
  // eslint-disable-next-line no-useless-escape
  /^(([^<>()\[\]\.,;:\s@\”]+(\.[^<>()\[\]\.,;:\s@\”]+)*)|(\”.+\”))@(([^<>()[\]\.,;:\s@\”]+\.)+[^<>()[\]\.,;:\s@\”]{2,})$/;

export default function Login() {
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

          <Typography component='h1' variant='h4' sx={{ color: '#ff7334' }}>
            Iniciar Sesión
          </Typography>
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
                    <Link
                      href='/forgot-password'
                      variant='body2'
                      color='#16382c'
                    >
                      ¿Olvidaste la contraseña?
                    </Link>
                  </Grid>
                  <Grid item>
                    <Link href='#' variant='body2' color='#16382c'>
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
  );
}
