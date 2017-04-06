INSERT INTO `locations` (`id`, `title`, `description`, `address`, `URL`, `takeaway`, `delivery`, `show_title`)
VALUES (NULL, 'REMA 1000 VULKAN', 'dette er en beskrivelse', 'Maridalsveien 15, 0178 OSLO', 'http://www.rema.no', '0', '0', '1'),
  (NULL, 'KIWI Markveien', NULL, 'Markveien 35B, 0554 Oslo', 'www.kiwi.no', '0', '0', '0');


INSERT INTO `location_images` (`loc_id`, `path`)
VALUES ('1', '/img/rema.png'),
  ('1', '/img/rema2.png'),
  ('1', '/img/rema3.png'),
  ('2', '/img/kiwi.png');

INSERT INTO `location_tags` (`loc_id`, `tag`)
VALUES ('1', 'dagligvare'),
  ('1', 'svindel'),
  ('1', 'overpriset'),
  ('1', 'usikker'),
  ('2', 'dagligvare'),
  ('2', 'middelmådig');

INSERT INTO `opening_hours` (`loc_id`, `day`, `open`, `close`)
VALUES ('1', '0', '07:00:00', '00:00:00'),
  ('1', '1', '07:00:00', '00:00:00'),
  ('1', '2', '07:00:00', '00:00:00'),
  ('1', '3', '07:00:00', '00:00:00'),
  ('1', '4', '07:00:00', '00:00:00'),
  ('1', '5', '07:00:00', '00:00:00'),
  ('2', '0', '07:00:00', '00:00:00'),
  ('2', '1', '07:00:00', '00:00:00'),
  ('2', '2', '07:00:00', '00:00:00'),
  ('2', '3', '07:00:00', '00:00:00'),
  ('2', '4', '07:00:00', '00:00:00');

INSERT INTO `phone_numbers` (`loc_id`, `country_code`, `number`)
VALUES ('2', '47', '12345678'),
  ('2', '47', '87654321'), ('1', '47', '56784321');
