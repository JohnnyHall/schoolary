# CHANGELOG

## 2021-07-06, v1.15

- Updated the generator phpdoc to help identify magic methods (#307)
- Prevent direct access and triggered deprecation warning for "word" (#302)
- Updated length on all global e164 numbers (#301)
- Updated Sobrenomes from different source (#312)
- Don't generate birth number of '000' for Swedish personal identity (#306)
- Add job list for localization id_ID (#339)

## 2021-03-30, v1.14.1

- Fix where randomNumber and randomFloat would return a 0 value (#291 / #292)

## 2021-03-29, v1.14.0

- Fix for realText to ensure the text keeps closer to its boundaries (#152)
- Fix where regexify produces a random character instead of a literal dot (#135
- Deprecate zh_TW methods that only call base methods (#122)
- Add used extensions to composer.json as suggestion (#120)
- Moved TCNo and INN from calculator to localized providers (#108)
- Fix regex dot/backslash issue where a dot is replaced with a backslash as escape character (#206)
- Deprecate direct property access (#164)
- Added test to assert unique() behaviour (#233)
- Added RUC for the es_PE locale (#244)
- Test IBAN formats for Latin America (AR/PE/VE) (#260)
- Added VAT number for en_GB (#255)
- Added new districts for the ne_NP locale (#258)
- Fix for U.S. Area Code Generation (#261)
- Fix in numerify where a better random numeric value is guaranteed (#256)
- Fix e164PhoneNumber to only generate valid phone numbers with valid country codes (#264)
- Extract fixtures into separate classes (#234)
- Remove french domains that no longer exists (#277)
- Fix error that occurs when getting a polish title (#279)
- Use valid area codes for North America E164 phone numbers (#280)

- Adding support for extensions and PSR-11 (#154)
- Adding trait for GeneratorAwareExtension (#165)
- Added helper class for extension (#162)
- Added blood extension to core (#232)
- Added barcode extension to core (#252)
- Added number extension (#257)

- Various code style updates
- Added a note about our breaking change promise (#273)

## 2020-12-18, v1.13.0

Several fixes and new additions in this release. A lot of cleanup has been done
on the codebase on both tests and consistency.

- Feature/pl pl license plate (#62)
- Fix greek phone numbers (#16)
- Move AT payment provider logic to de_AT (#72)
- Fix wiktionary links (#73)
- Fix AT person links (#74)
- Fix AT cities (#75)
- Deprecate at_AT providers (#78)
- Add Austrian `ssn()` to `Person` provider (#79)
- Fix typos in id_ID Address (#83)
- Austrian post codes (#86)
- Updated Polish data (#70)
- Improve Austrian social security number generation (#88)
- Move US phone numbers with extension to own method (#91)
- Add UK National Insurance number generator (#89)
- Fix en_SG phone number generator (#100)
- Remove usage of mt_rand (#87)
- Remove whitespace from beginning of el_GR phone numbers (#105)
- Building numbers can not be 0, 00, 000 (#107)
- Add 172.16/12 local IPv4 block (#121)
- Add JCB credit card type (#124)
- Remove json_decode from emoji generation (#123)
- Remove ro street address (#146)

## 2020-12-11, v1.12.1

This is a security release that prevents a hacker to execute code on the server.

## 2020-11-23, v1.12.0

- Fix ro_RO first and last day of year calculation offset (#65)
- Fix en_NG locale test namespaces that did not match PSR-4 (#57)
- Added Singapore NRIC/FIN provider (#56)
- Added provider for Lithuanian municipalities (#58)
- Added Filmes provider (#61)

## 2020-11-15, v1.11.0

- Added Provider for Swedish Municipalities
- Updates to person names in pt_BR
- Many code style changes

## 2020-10-28, v1.10.1

- Updates the Danish addresses in dk_DK
- Removed offense company names in nl_NL
- Clarify changelog with original fork
- Standin replacement for LoremPixel to Placeholder.com (#11)

## 2020-10-27, v1.10.0

- Support PHP 7.1-8.0
- Fix typo in de_DE Company Provider
- Fix dateTimeThisYear method
- Fix typo in de_DE jobTitleFormat
- Fix IBAN generation for CR
- Fix typos in greek Primeiro nomes
- Fix US job title typo
- Do not clear entity manager for doctrine orm populator
- Remove persian rude words
- Corrections to RU names

## 2020-10-27, v1.9.1

- Initial version. Same as `fzaninotto/Faker:v1.9.1`.
