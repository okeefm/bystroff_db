SELECT 
	s.id,
	s.Name_of_Sample, 
	s.Volume, 
	s.Purity, 
	s.Concentration, 
	s.Date, 
	s.Amount, 
	s.Gi_number, 
	s.Sequence, 
	s.Comments,
	s.last_update,
	s.location AS location_id,
	s.sublocation AS sublocation_id,
	s.box AS box_id,
	s.owner AS owner_id,
	s.type AS type_id,
	l.value AS location, 
	sl.value AS sublocation,
	b.value AS box, 
	o.name AS owner, 
	t.value AS type 
FROM samples AS s
 LEFT JOIN locations AS l
	ON s.location = l.id
 LEFT JOIN sublocations AS sl
	ON s.sublocation = sl.id
 LEFT JOIN boxes AS b
	ON s.box = b.id
 LEFT JOIN owners AS o
	ON s.owner = o.id 
 LEFT JOIN types AS t
	ON s.type = t.id;