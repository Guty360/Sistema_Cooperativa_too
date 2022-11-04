import React from 'react';
import { Formik, Form } from 'formik';
import { Chip, Divider, Grid, TextField } from '@mui/material';
import Map from '../../components/Map/Map';
import SelectCountries from '../../components/SelectCountries';

function InformacionDomicilio() {
  return (
    <React.Fragment>
      <Formik
        initialValues={{
          country: '',
          region: '',
          subregion: '',
        }}
      >
        {({ values, errors, handleChange, handleBlur }) => (
          <Form>
            <Divider>
              <Chip label='Datos del domilicio' />
            </Divider>
            <Grid
              container
              spacing={{ xs: 2, md: 3 }}
              columns={{ xs: 4, md: 12 }}
            >
              <Grid item xs={4} sm={4} md={4}>
                <SelectCountries />
              </Grid>
              <Grid item xs={4} sm={4} md={4}>
                <TextField
                  id='region'
                  name='region'
                  margin='normal'
                  required
                  fullWidth
                  label='Region'
                  value={values.region}
                  onChange={handleChange}
                  onBlur={handleBlur}
                />
              </Grid>
              <Grid item xs={4} sm={4} md={4}>
                <TextField
                  id='region'
                  name='region'
                  margin='normal'
                  required
                  fullWidth
                  label='Subregion'
                  value={values.region}
                  onChange={handleChange}
                  onBlur={handleBlur}
                />
              </Grid>
            </Grid>
            <Divider>
              <Chip label='Datos geolocalización' />
            </Divider>
            <Grid
              container
              spacing={{ xs: 2, md: 3 }}
              columns={{ xs: 4, md: 12 }}
            >
              <Grid item>
                <Map />
              </Grid>
            </Grid>
          </Form>
        )}
      </Formik>
    </React.Fragment>
  );
}

export default InformacionDomicilio;
