SET @serial=0;
SELECT DISTINCT(box) AS value, @serial := @serial+1 AS idboxes,
bystroffdb.locations.id AS location, 
bystroffdb.sublocations.id AS sublocation FROM bystroffdb.samples 
INNER JOIN bystroffdb.locations ON (samples.location = locations.value)
INNER JOIN bystroffdb.sublocations ON (samples.sublocation = sublocations.value)
;