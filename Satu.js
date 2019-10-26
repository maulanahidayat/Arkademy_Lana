
function setBiodata(nama, umur) {
    let biodata = {
        name : nama,
        age : umur,
        address : "GG. Syarif Husin",
        hobbies : [
            'Membaca',
            'Menulis'
        ],
        is_married : false,
        list_school : {
            sekolah1 : {
                name : "Man Pelaihari",
                yer_in : "2014",
                yer_out : "2016"
            },
            sekolah2 : {
                name : "MTsn 1 Pelaihari",
                year_in : "2011",
                year_out : "2013"
            }
        },
        skills : {
            skill1 : {
                name : "Web Developer",
                level : "Beginner"
            },
            skill2 : {
                nama : "Information Logic",
                level : "Advanced"
            },
            skill3 : {
                nama : "Pemrograman Android",
                skill : "Beginer"
            }
        },
        interest_in_coding : true        
    };

    let result = JSON.stringify(biodata);
    return result;
}

let bio1 = setBiodata("Maulana", 22);
let bio2 = setBiodata("Hidayat", 22);

console.dir(bio1);
console.log(bio2);