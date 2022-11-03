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
import ButtonComp from '../../components/Button';

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
  const handleSubmit = (event) => {
    event.preventDefault();
    const data = new FormData(event.currentTarget);
    console.log({
      email: data.get('email'),
      password: data.get('password'),
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
          <Box
            component='form'
            onSubmit={handleSubmit}
            noValidate
            sx={{ mt: 1 }}
          >
            <TextField
              margin='normal'
              required
              fullWidth
              id='email'
              label='Ingresa correo electrónico'
              name='email'
              autoComplete='email'
              autoFocus
              sx={{ width: '40ch' }}
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
        </Box>
        <Copyright sx={{ mt: 8, mb: 4 }} />
      </Container>
    </ThemeProvider>
  );
}
