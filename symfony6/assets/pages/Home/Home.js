import React from 'react';
import { Box, Grid, Typography, Link, Button } from '@mui/material';
import '../../styles/components/Image.css';
import Navbar from '../../components/Navbar/Navbar';
function HomeComp() {
  return (
    <>
      <Navbar />
      <Box sx={{ mt: 15, background: '#16382c', width: '100%' }}>
        <Grid
          container
          sx={{
            display: 'flex',
            alignItems: 'stretch',
            ml: 5,
            mr: 5,
          }}
          columns={{ xs: 4, sm: 8, md: 12 }}
        >
          <Grid
            item
            xs={4}
            sm={4}
            md={6}
            sx={{ width: '50vw', height: '70vh' }}
          >
            <Link underline='none' hrefgit='/ingreso-asociado'>
              <Typography variant='h2' color='white' sx={{ mt: 5 }}>
                Asociate con nosotros
              </Typography>
            </Link>
            <Button
              variant='contained'
              href='/ingreso-asociado'
              sx={{ background: '#ff7334' }}
            >
              Registro asociado
            </Button>
          </Grid>
          <Grid
            item
            xs={4}
            sm={4}
            md={6}
            sx={{ width: { xs: '100%', md: '50%' } }}
          ></Grid>
        </Grid>
      </Box>
    </>
  );
}

export default HomeComp;
