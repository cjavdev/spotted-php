# Changelog

## 0.11.0 (2026-02-12)

Full Changelog: [v0.10.0...v0.11.0](https://github.com/cjavdev/spotted-php/compare/v0.10.0...v0.11.0)

### Features

* **api:** api update ([4691fbf](https://github.com/cjavdev/spotted-php/commit/4691fbfc0c78db5e031fe576cdee71e631e28b9f))

## 0.10.0 (2026-02-10)

Full Changelog: [v0.9.0...v0.10.0](https://github.com/cjavdev/spotted-php/compare/v0.9.0...v0.10.0)

### Features

* **api:** api update ([32c2a99](https://github.com/cjavdev/spotted-php/commit/32c2a991d96c49ab588cc088f2091674b30bdf9e))

## 0.9.0 (2026-02-08)

Full Changelog: [v0.8.0...v0.9.0](https://github.com/cjavdev/spotted-php/compare/v0.8.0...v0.9.0)

### Features

* **api:** api update ([1545060](https://github.com/cjavdev/spotted-php/commit/15450602da33032f981a3a2b75bf23b2585bfd2f))

## 0.8.0 (2026-02-03)

Full Changelog: [v0.7.1...v0.8.0](https://github.com/cjavdev/spotted-php/compare/v0.7.1...v0.8.0)

### Features

* use `$_ENV` aware getenv helper ([c4f0a76](https://github.com/cjavdev/spotted-php/commit/c4f0a764758b35672a9cc53c64abf174e156601f))


### Chores

* **internal:** php cs fixer should not be memory limited ([b64c741](https://github.com/cjavdev/spotted-php/commit/b64c741a02eddfb1e671b7bab2956ba61646671a))

## 0.7.1 (2026-01-31)

Full Changelog: [v0.7.0...v0.7.1](https://github.com/cjavdev/spotted-php/compare/v0.7.0...v0.7.1)

### Bug Fixes

* used redirect count instead of retry count in base client ([a5220ed](https://github.com/cjavdev/spotted-php/commit/a5220ed506cdae4ac96214ebaec66f7d2ac07580))

## 0.7.0 (2026-01-31)

Full Changelog: [v0.6.3...v0.7.0](https://github.com/cjavdev/spotted-php/compare/v0.6.3...v0.7.0)

### Features

* add setters to constant parameters ([6a29aa5](https://github.com/cjavdev/spotted-php/commit/6a29aa5c44a590ce63319d0b5e65e7cf5a6cf252))


### Chores

* **internal:** ignore stainless-internal artifacts ([1aaba84](https://github.com/cjavdev/spotted-php/commit/1aaba84a02639b9b51a8866594e9c8161c146312))

## 0.6.3 (2026-01-21)

Full Changelog: [v0.6.2...v0.6.3](https://github.com/cjavdev/spotted-php/compare/v0.6.2...v0.6.3)

### Chores

* **internal:** update phpstan comments ([65e581c](https://github.com/cjavdev/spotted-php/commit/65e581c51a05cb17aa98c30a66ec69d858338e18))

## 0.6.2 (2026-01-17)

Full Changelog: [v0.6.1...v0.6.2](https://github.com/cjavdev/spotted-php/compare/v0.6.1...v0.6.2)

### Chores

* **internal:** minor test script reformatting ([f91ce91](https://github.com/cjavdev/spotted-php/commit/f91ce918d060e4919bb53eba69e0c4eba7b54cc3))
* **internal:** update `actions/checkout` version ([9e27b79](https://github.com/cjavdev/spotted-php/commit/9e27b796a228ff7f57559c6d9bbc01599b811641))

## 0.6.1 (2026-01-15)

Full Changelog: [v0.6.0...v0.6.1](https://github.com/cjavdev/spotted-php/compare/v0.6.0...v0.6.1)

### Chores

* remove custom code ([2ea90a3](https://github.com/cjavdev/spotted-php/commit/2ea90a3e6c56644d944c876bcf66974cb10124b6))

## 0.6.0 (2026-01-15)

Full Changelog: [v0.5.0...v0.6.0](https://github.com/cjavdev/spotted-php/compare/v0.5.0...v0.6.0)

### Features

* **api:** manual updates ([bea0777](https://github.com/cjavdev/spotted-php/commit/bea0777d16be5fd6f2ce23878c7f115aaed403c1))

## 0.5.0 (2026-01-15)

Full Changelog: [v0.4.0...v0.5.0](https://github.com/cjavdev/spotted-php/compare/v0.4.0...v0.5.0)

### Features

* **api:** manual updates ([adfc2ff](https://github.com/cjavdev/spotted-php/commit/adfc2ff3fe8b46f8f39fade6f81c85c02b1c08ee))
* **api:** turn off oauth ([b9141b9](https://github.com/cjavdev/spotted-php/commit/b9141b96e2f128be4bfe3374082951caba74c36b))


### Bug Fixes

* typos in README.md ([601d48a](https://github.com/cjavdev/spotted-php/commit/601d48a0b1aa147c3c2013631547114d8cb1885f))


### Chores

* **internal:** codegen related update ([652146b](https://github.com/cjavdev/spotted-php/commit/652146b303b3802d4448e045b078cd140b4efea0))
* **internal:** codegen related update ([1700197](https://github.com/cjavdev/spotted-php/commit/1700197f760943ec8c63f836e51679e1b3220534))
* **readme:** remove beta warning now that we're in ga ([c1007a2](https://github.com/cjavdev/spotted-php/commit/c1007a2d1dac41ba8f63603b3306c59a5f160d2b))
* remove custom code ([8d8fc93](https://github.com/cjavdev/spotted-php/commit/8d8fc936e84034a3318f4951bc2993d7c46017c7))

## 0.4.0 (2026-01-12)

Full Changelog: [v0.3.0...v0.4.0](https://github.com/cjavdev/spotted-php/compare/v0.3.0...v0.4.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* use aliases for phpstan types
* use camel casing for all class properties
* use camel casing for all class properties

### Features

* add `BaseResponse` class for accessing raw responses ([5d30f40](https://github.com/cjavdev/spotted-php/commit/5d30f40cfe85670049e24587075638ee17a82835))
* add `BaseResponse` class for accessing raw responses ([9dfdfe0](https://github.com/cjavdev/spotted-php/commit/9dfdfe05ff38541d39af89f88dd510bae8c7c367))
* add idempotency header support ([7a9c27e](https://github.com/cjavdev/spotted-php/commit/7a9c27e2e7438a58e81936dcb482b8219633fb86))
* allow both model class instances and arrays in setters ([9b49855](https://github.com/cjavdev/spotted-php/commit/9b49855fa778885dec685b6c199c56cba61fbcb6))
* allow both model class instances and arrays in setters ([f587ace](https://github.com/cjavdev/spotted-php/commit/f587aceaf09cc7deed54aa26efef1a9d0c695ae3))
* **api:** manual updates ([c1fbae7](https://github.com/cjavdev/spotted-php/commit/c1fbae724d7dbdd1209e22402b6ff7cd5e1454f3))
* **api:** manual updates ([b6f1b13](https://github.com/cjavdev/spotted-php/commit/b6f1b1369642d1fa4764f1434c2fa0062a2f7f3f))
* **api:** manual updates ([2de9f0c](https://github.com/cjavdev/spotted-php/commit/2de9f0cd1cbb45c656ab0227f0f4fd8b80465597))
* **api:** manual updates ([71ec217](https://github.com/cjavdev/spotted-php/commit/71ec21708535a226ad6b8a047be0eb2330c09d02))
* **api:** manual updates ([43ec835](https://github.com/cjavdev/spotted-php/commit/43ec83512ea32e0e3a476ac6fb9b0fd3f150431b))
* **api:** manual updates ([fc9ddb8](https://github.com/cjavdev/spotted-php/commit/fc9ddb8d5e69c225479c27d76c4224e91e8cda62))
* **api:** manual updates ([cd30403](https://github.com/cjavdev/spotted-php/commit/cd30403cb9720cd0bab74b056addc8d85a527ddd))
* **api:** manual updates ([ec6d2ae](https://github.com/cjavdev/spotted-php/commit/ec6d2aeaca07b89c1908605d3d0a158e3803fe67))
* **api:** manual updates ([3929562](https://github.com/cjavdev/spotted-php/commit/392956235112faffd81e6f4b2e33d876d90faadb))
* **api:** manual updates ([d3c80ca](https://github.com/cjavdev/spotted-php/commit/d3c80caf4e61361ee4d31d62bb050133cd5cc203))
* **api:** manual updates ([14e98de](https://github.com/cjavdev/spotted-php/commit/14e98de17180b22772477f71546d9af4f26b3646))
* **api:** Update readme titles. ([42ab39c](https://github.com/cjavdev/spotted-php/commit/42ab39c7f5ca164851825104cf551450133816ba))
* **api:** Update readme titles. ([e34bf53](https://github.com/cjavdev/spotted-php/commit/e34bf539c98622eead7be0e648e03bb071380750))
* better support for pagination mechanisms ([b230320](https://github.com/cjavdev/spotted-php/commit/b2303209942b4ee36e8244c6c6f0fa028e41099e))
* better support for pagination mechanisms ([3c58600](https://github.com/cjavdev/spotted-php/commit/3c58600a1f0d60d700c6299a33618e79e9229148))
* improved phpstan type annotations ([0d8dfb7](https://github.com/cjavdev/spotted-php/commit/0d8dfb7b830d505f0cdafa84aee6606b2506e3a0))
* replace special flag type `omittable` with just `null` ([32cf1af](https://github.com/cjavdev/spotted-php/commit/32cf1af90f31c4ce18b6c7d19b6560bb13dd44a2))
* simplify and make the phpstan types more consistent ([06744f7](https://github.com/cjavdev/spotted-php/commit/06744f7b4f9defe8b79a2d98bf0372daad296453))
* split out services into normal & raw types ([458daea](https://github.com/cjavdev/spotted-php/commit/458daeade7caf4a26bdfa933c3712d2d7e54e1de))
* split out services into normal & raw types ([cea94ef](https://github.com/cjavdev/spotted-php/commit/cea94ef7ade0933ff6b641cad79268ee7f5ab586))
* support unwrapping envelopes ([d83e7c2](https://github.com/cjavdev/spotted-php/commit/d83e7c2b656d55e4e55976dfabe7497bb3b0d430))
* use aliases for phpstan types ([14e5d2d](https://github.com/cjavdev/spotted-php/commit/14e5d2d5d9ce2ef985ba58b96aec1babe95b145a))
* use camel casing for all class properties ([7c239a2](https://github.com/cjavdev/spotted-php/commit/7c239a2807ff585c23944e054c8623641eaa7575))
* use camel casing for all class properties ([ea145b0](https://github.com/cjavdev/spotted-php/commit/ea145b039ed286a2b059920d184ee1a3c98e0e8e))


### Bug Fixes

* a number of serialization errors ([f872f24](https://github.com/cjavdev/spotted-php/commit/f872f244236dc7354d2720524a0a751fa80539e7))
* correctly serialize dates ([ae99d35](https://github.com/cjavdev/spotted-php/commit/ae99d35370a56beaf5595920d9a4c268a7f04459))
* support arrays in query param construction ([081b6e2](https://github.com/cjavdev/spotted-php/commit/081b6e2a450af79e4a29dc0980fd3d0d0004b9c5))


### Chores

* add git attributes and composer lock file ([84789e4](https://github.com/cjavdev/spotted-php/commit/84789e4c2d9efd5c9d4583c0d13342661d5525e7))
* be more targeted in suppressing superfluous linter warnings ([5bc27f4](https://github.com/cjavdev/spotted-php/commit/5bc27f409abeb5e90892a651e457fa78402c45a9))
* be more targeted in suppressing superfluous linter warnings ([39b3925](https://github.com/cjavdev/spotted-php/commit/39b3925a84036685a677abade1a974761ea923a3))
* better support for phpstan ([3534bf3](https://github.com/cjavdev/spotted-php/commit/3534bf340d510e6d8d90cd77455cf96c814ed930))
* better support for phpstan ([c0b0423](https://github.com/cjavdev/spotted-php/commit/c0b0423c4747ba284789807ea34a051dadd099ba))
* ensure constant values are marked as optional in array types ([c976602](https://github.com/cjavdev/spotted-php/commit/c97660246650ffb262883878b7180af54691dcda))
* ensure constant values are marked as optional in array types ([22948f7](https://github.com/cjavdev/spotted-php/commit/22948f78211ab32102ab03f21bd47a58ae60d06f))
* formatting ([170d25f](https://github.com/cjavdev/spotted-php/commit/170d25f9d835bd28b02606a6d638be7c864dab01))
* formatting ([ba6ca82](https://github.com/cjavdev/spotted-php/commit/ba6ca825ec8c593a8320f5281054013b4ae0484a))
* **internal:** add a basic client test ([ae4aecc](https://github.com/cjavdev/spotted-php/commit/ae4aecc9a957dee6cebbb235f369660ffa7efd00))
* **internal:** codegen related update ([6877221](https://github.com/cjavdev/spotted-php/commit/6877221761a72e9fdfba85f90ed0a4df14be00ee))
* **internal:** codegen related update ([cae132d](https://github.com/cjavdev/spotted-php/commit/cae132deca870da5d53336717028869786ebeb4a))
* **internal:** codegen related update ([a3b630e](https://github.com/cjavdev/spotted-php/commit/a3b630e7267dcbd2a0406541b05b5489aa4672fc))
* **internal:** codegen related update ([f24a9c6](https://github.com/cjavdev/spotted-php/commit/f24a9c64d651b327ffdc2250c664d00468d72993))
* **internal:** codegen related update ([d3c0063](https://github.com/cjavdev/spotted-php/commit/d3c00634b004b04e1e2ca9f6c160f9ab76807966))
* **internal:** codegen related update ([9dc7838](https://github.com/cjavdev/spotted-php/commit/9dc7838d47e35ff27205f3d621a46603a1d897e4))
* **internal:** codegen related update ([9a2fbec](https://github.com/cjavdev/spotted-php/commit/9a2fbec7a4fe869c0316bbf96c16b21450a4faf6))
* **internal:** codegen related update ([d35e5dd](https://github.com/cjavdev/spotted-php/commit/d35e5dd1175ca6b91152e00199914747eb9d26ee))
* **internal:** improve pagination tests ([19d6709](https://github.com/cjavdev/spotted-php/commit/19d670941f988ee5fdec23d3968c0ba03c3acfd9))
* **internal:** improve pagination tests ([7b952c4](https://github.com/cjavdev/spotted-php/commit/7b952c4a499d1fa96684986493f5d4b5c17625e5))
* **internal:** refactor auth by moving concern from base client into client ([503f249](https://github.com/cjavdev/spotted-php/commit/503f249baa6052f2e93af5f02ad6f501cac1414e))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([ff912ce](https://github.com/cjavdev/spotted-php/commit/ff912ce6dc6e007871d21d2cc07d2b6af9b4e8fb))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([1a0c86c](https://github.com/cjavdev/spotted-php/commit/1a0c86c31a4a9cd2fe072c7793ed3405d3650e47))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([e0994ad](https://github.com/cjavdev/spotted-php/commit/e0994ad5696b93260090334afbd56c5261a8ba75))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([27ae21e](https://github.com/cjavdev/spotted-php/commit/27ae21e65e88d32cfd3c8b199d25cd1212935be6))
* use non-trivial test assertions ([fabf4f1](https://github.com/cjavdev/spotted-php/commit/fabf4f1bc523fedd113bdd81caab56e7295109bf))
* use non-trivial test assertions ([3b66014](https://github.com/cjavdev/spotted-php/commit/3b66014cba5e798a7b2383051ddcec09f877b94a))

## 0.3.0 (2025-11-27)

Full Changelog: [v0.2.0...v0.3.0](https://github.com/cjavdev/spotted-php/compare/v0.2.0...v0.3.0)

### Features

* **api:** manual updates ([b59eb08](https://github.com/cjavdev/spotted-php/commit/b59eb08bc92bdd8356687e390845f0e62901ce68))
* **api:** manual updates ([6a888dd](https://github.com/cjavdev/spotted-php/commit/6a888ddaa9d771d6c743ec18411eb471749ea9d4))
* **api:** manual updates ([a551597](https://github.com/cjavdev/spotted-php/commit/a55159767f3ddbb7d8861b8fae3326a3ba38f064))
* **api:** manual updates ([f46e12b](https://github.com/cjavdev/spotted-php/commit/f46e12b7737a9d37ec0bde0bf9a4904e09454188))
* **api:** manual updates ([7aef3ab](https://github.com/cjavdev/spotted-php/commit/7aef3ab57e33d16f6af19c43187cb7e2aec38dbf))
* **api:** manual updates ([11111fd](https://github.com/cjavdev/spotted-php/commit/11111fd18450213eb9c0aaa31ea2e409ed23e0d2))
* **api:** manual updates ([fae3dd3](https://github.com/cjavdev/spotted-php/commit/fae3dd3f6a736a013bc1bd61dec11a3bbb3e8b20))
* **api:** rename public to published for java ([60cf1fa](https://github.com/cjavdev/spotted-php/commit/60cf1fab8ecec56b41c5773388d1a1abc209ba33))


### Bug Fixes

* phpStan linter errors ([55d7af2](https://github.com/cjavdev/spotted-php/commit/55d7af27bd72f4e98c370929f00e35a7659b2de7))


### Chores

* **client:** refactor error type constructors ([557ec0b](https://github.com/cjavdev/spotted-php/commit/557ec0b26f168bb113a682eb09d4720606caac13))
* typing updates ([7fce45e](https://github.com/cjavdev/spotted-php/commit/7fce45ec903c3936649c18f04cf3d9149349993d))
* use single quote strings ([2771aa0](https://github.com/cjavdev/spotted-php/commit/2771aa05550833ebcd63ccf0eee4f8c3909618bd))

## 0.2.0 (2025-11-20)

Full Changelog: [v0.1.1...v0.2.0](https://github.com/cjavdev/spotted-php/compare/v0.1.1...v0.2.0)

### Features

* **api:** update composer package name for PHP ([9b289dd](https://github.com/cjavdev/spotted-php/commit/9b289dd7e6b6434c25cdcffe5304cf1c2b9b8479))

## 0.1.1 (2025-11-19)

Full Changelog: [v0.1.0...v0.1.1](https://github.com/cjavdev/spotted-php/compare/v0.1.0...v0.1.1)

## 0.1.0 (2025-11-19)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/cjavdev/spotted-php/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* **client:** redesign methods

### Features

* **api:** Adds custom helper for datetime conversion ([60caeec](https://github.com/cjavdev/spotted-php/commit/60caeec01d0ec6eafaa35ea29a6bf84bd7e0c99f))
* **api:** manual updates ([1509299](https://github.com/cjavdev/spotted-php/commit/15092998359d6055da8f8b13277f24537343d190))
* **api:** manual updates ([7cc403f](https://github.com/cjavdev/spotted-php/commit/7cc403fe1ae5ba4371ed96837f2914392a36d8ad))
* **api:** manual updates ([3c21ac3](https://github.com/cjavdev/spotted-php/commit/3c21ac3ada632aa9d310dd1d4dcfda4cc408fed1))
* **api:** manual updates ([3b5ba67](https://github.com/cjavdev/spotted-php/commit/3b5ba6791cc7f11530c41ba4d03b1507d3146ed7))
* **api:** manual updates ([19c1267](https://github.com/cjavdev/spotted-php/commit/19c1267bae8df769a4707db495bb5c861bce2dc0))
* **api:** manual updates ([14883c4](https://github.com/cjavdev/spotted-php/commit/14883c4b2cd5a852ce1428cbe46a96d6f32daa30))
* **api:** manual updates ([268be33](https://github.com/cjavdev/spotted-php/commit/268be337b4e5994986547ebbf91f355b142dbd4c))
* **api:** manual updates ([4cc9dfc](https://github.com/cjavdev/spotted-php/commit/4cc9dfc25f52aeda6a20a0560b63ac3628828a81))
* **api:** manual updates ([f5b394c](https://github.com/cjavdev/spotted-php/commit/f5b394c3dcfb94a98b77c1f89138adb5cabcec34))
* **api:** manual updates ([4535c1d](https://github.com/cjavdev/spotted-php/commit/4535c1dda4d12ff2acd04a88a244ea4545c7ae25))
* **api:** manual updates ([72935a7](https://github.com/cjavdev/spotted-php/commit/72935a74f49462d3f0a4a936e34ee13853e6cade))
* **api:** manual updates ([1a554ff](https://github.com/cjavdev/spotted-php/commit/1a554ff8bf72ba6254d1e33b805bcb56acf1d9d8))
* **api:** manual updates ([309114e](https://github.com/cjavdev/spotted-php/commit/309114e949311953eb07868fa09d35a195c177a7))
* **api:** manual updates ([ae21660](https://github.com/cjavdev/spotted-php/commit/ae216600b8640b6836b4e54c18e9e0a0e8010afc))
* **api:** manual updates ([5e49d6f](https://github.com/cjavdev/spotted-php/commit/5e49d6f735e2b252e30f18e2a67016db7a8b4b99))
* **api:** manual updates ([b3d6617](https://github.com/cjavdev/spotted-php/commit/b3d66177ea7347c86bf4a03c91f4abd977c8d4ab))
* **client:** redesign methods ([6429a72](https://github.com/cjavdev/spotted-php/commit/6429a72ec414e646932faa96a22c3c1450e55bc6))


### Bug Fixes

* rename invalid types ([3dfc039](https://github.com/cjavdev/spotted-php/commit/3dfc039a38e39b8a0666781493c90c14b76d656c))


### Chores

* **client:** send metadata headers ([3589b5f](https://github.com/cjavdev/spotted-php/commit/3589b5fec31d2c0ff6937258bdac2eb2ad3ce1d4))
* configure new SDK language ([25d5687](https://github.com/cjavdev/spotted-php/commit/25d56878641c8796898cc73d27519d25f249fa81))
* **internal:** codegen related update ([7ad8587](https://github.com/cjavdev/spotted-php/commit/7ad85875ecb6cb66b3507e6fc1681c3677fc0dad))
* update SDK settings ([6e58d83](https://github.com/cjavdev/spotted-php/commit/6e58d83edb1aefdb42a457fa80a14c4fd5db434e))
* use pascal case for phpstan typedefs ([7e50950](https://github.com/cjavdev/spotted-php/commit/7e50950b779e8cdffd3ecdde2b95ad37cd3ef3cd))
