import React from 'react';
import L from 'leaflet';

const IconLocation = L.icon({
  iconUrl: require('../../assets/venue_location_icon.svg'),
  iconRetinaUrl: require('../../assets/venue_location_icon.svg'),
  shadowAnchor: null,
  shadowUrl: null,
  shadowSize: null,
  iconAnchor: null,
  iconSize: [35, 35],
  className: 'leaflet-venue-icon',
});

export default IconLocation;
