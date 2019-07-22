require('jquery');


// let urlSymptoms = window.location + 'admin/utility/symptoms';
//
// function getSymptoms(urlSymptoms)
// {
//     fetch(urlSymptoms)
//         .then((response) => response.json())
//         .then((data) => {
//
//             let allSymptoms = [];
//
//             for (let key in data) {
//                 // skip loop if the property is from prototype
//                 if (!data.hasOwnProperty(key)) {
//                     continue;
//                 }
//
//                 let object = data[key];
//                 for (let symptom in object) {
//                     // skip loop if the property is from prototype
//                     if (!object.hasOwnProperty(symptom)) {
//                         continue;
//                     }
//                     allSymptoms.push(object[symptom].name);
//                 }
//             }
//             console.log(allSymptoms);
//         })
//         .catch((error) => console.log(error));
// }
//
// $(document).ready(function () {
//
//     let substringMatcher = function (strs) {
//         return function findMatches(q, cb)
//         {
//             let matches, substringRegex;
//
//             // an array that will be populated with substring matches
//             matches = [];
//
//             // regex used to determine if a string contains the substring `q`
//             substrRegex = new RegExp(q, 'i');
//
//             // iterate through the pool of strings and for any string that
//             // contains the substring `q`, add it to the `matches` array
//             $.each(strs, function (i, str) {
//                 if (substrRegex.test(str)) {
//                     matches.push(str);
//                 }
//             });
//
//             cb(matches);
//         };
//     };
//
//     // let symptoms = getSymptoms(urlSymptoms);
//     let symptoms = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
//         'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
//         'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
//         'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
//         'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
//         'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
//         'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
//         'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
//         'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
//     ];
//
//     $('.typeahead').typeahead(
//         {
//             hint: true,
//             highlight: true,
//             minLength: 1
//         },
//         {
//             name: 'symptoms',
//             source: substringMatcher(symptoms)
//         }
//     );
// });