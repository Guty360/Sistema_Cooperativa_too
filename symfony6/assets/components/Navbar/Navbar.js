import React from 'react';
import {
  AppBar,
  Typography,
  Toolbar,
  Button,
  Box,
  useMediaQuery,
  createTheme,
} from '@mui/material';
import { Handshake, Login } from '@mui/icons-material';
import DrawerComp from './Drawer';
import { useAuth } from '../../Context/AuthContext';
export const navItems = ['Home', 'About', 'Contact Us'];
function Navbar() {
  const { user } = useAuth();

  const theme = createTheme({
    breakpoints: {
      values: {
        xs: 0,
        sm: 600,
        md: 998,
        lg: 1200,
        xl: 1536,
      },
    },
  });

  const isMatch = useMediaQuery(theme.breakpoints.down('md'));

  return (
    <>
      <AppBar sx={{ background: '#fff5ed', minHeight: '128px' }}>
        <Toolbar>
          <>
            <Handshake
              sx={{
                display: { md: 'flex', alignSelf: 'flex-start' },
                color: '#16382c',
                mr: 1,
                marginTop: '53px',
                marginLeft: '20px',
              }}
            />
            <Typography
              variant='h6'
              noWrap
              component='a'
              href='/'
              sx={{
                mr: 2,
                flexGrow: 1,
                alignSelf: 'flex-start',
                fontWeight: 700,
                letterSpacing: '.3rem',
                color: '#16382c',
                textDecoration: 'none',
                marginTop: '45px',
                fontSize: '1.5rem',
              }}
            >
              COOPERATIVA
            </Typography>
          </>

          {isMatch ? (
            <>
              <DrawerComp />
            </>
          ) : (
            <>
              <Box
                sx={{
                  display: { xs: 'none', sm: 'block' },
                  marginTop: '40px',
                  marginLeft: '20px',
                }}
              >
                {navItems.map((item) => (
                  <Button
                    key={item}
                    sx={{ color: '#16382c', marginRight: '25px' }}
                  >
                    {item}
                  </Button>
                ))}
              </Box>
              {user.login ? (
                <>
                  <Box sx={{ marginLeft: 'auto', marginTop: '40px' }}>
                    <Button
                      className='boton-ingreso'
                      sx={{
                        background: '#ff7334',
                        margin: '5px',
                        marginRight: '20px',
                      }}
                      variant='contained'
                      href='/logout'
                    >
                      <Login sx={{ marginRight: '5px', color: '#fefefe' }} />
                      Logout
                    </Button>
                  </Box>
                </>
              ) : (
                <>
                  <Box sx={{ marginLeft: 'auto', marginTop: '40px' }}>
                    <Button
                      className='boton-ingreso'
                      sx={{
                        background: '#16382c',
                        margin: '5px',
                        marginRight: '20px',
                      }}
                      variant='contained'
                      href='/login'
                    >
                      <Login sx={{ marginRight: '5px', color: '#fefefe' }} />
                      Login
                    </Button>
                    <Button
                      className='boton-ingreso'
                      sx={{
                        backgroundColor: '#ff7334',
                        margin: '5px',
                        marginRight: '50px',
                      }}
                      variant='contained'
                      href='/registro'
                    >
                      Registrarse
                    </Button>
                  </Box>
                </>
              )}
            </>
          )}
        </Toolbar>
      </AppBar>
    </>
  );
}

export default Navbar;
