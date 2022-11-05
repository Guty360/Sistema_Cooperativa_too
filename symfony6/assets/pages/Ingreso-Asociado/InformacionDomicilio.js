import React, { useState } from 'react';
import { Formik, Form } from 'formik';
import { Chip, Divider, Grid, TextField, MenuItem } from '@mui/material';
import Map from '../../components/Map/Map';
import SelectCountries from '../../components/SelectCountries';
import { countries } from '../../data/countries/countries';
function InformacionDomicilio() {
  const [idCountry, setIdCountry] = useState(null);
  const [region, setRegion] = useState('');
  const [subRegion, setSubRegion] = useState('');

  return (
    <React.Fragment>
      <Formik
        initialValues={{
          country: 'El Salvador',
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
              <Grid item xs={4} sm={4} md={4} sx={{ mt: 2 }}>
                <TextField
                  id='country'
                  name='country'
                  required
                  select
                  fullWidth
                  label='País de nacimiento'
                  autoComplete='country'
                  value={values.country}
                  onChange={handleChange}
                  onBlur={handleBlur}
                  sx={{ mb: 3 }}
                >
                  {countries.map((option) => (
                    <MenuItem key={option.id} value={option.name}>
                      {option.name}
                    </MenuItem>
                  ))}
                </TextField>
              </Grid>
              <Grid item xs={4} sm={4} md={4}>
                <TextField
                  id='region'
                  name='region'
                  margin='normal'
                  required
                  fullWidth
                  select
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
