import React from 'react';
import { Box, Grid, Typography } from '@mui/material';
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
            sx={{ width: { xs: '100%', md: '50%' } }}
          >
            <Typography variant='h2' color='white'>
              Asociate con nosotros
            </Typography>
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
