<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Form  <a href="/index"><Button class="btn btn-success">List</Button></a>     </h1></div>

                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                          {{ success }}
                        </div>
                        <form @submit="formSubmit" enctype="multipart/form-data">


                        <strong>Name:</strong>
                        <input type="text" class="form-control" name="name"  v-model="name">

                        <span v-if='msg.name'>{{msg.name}}</span><br>
                            <strong>Email:</strong><br>
                        <input type="text" class="form-control"  name="email"   v-model="email">
                        <span v-if='msg.email'>{{msg.email}}</span><br>
                            <strong>Password:</strong>
                        <input type="password" class="form-control"  name="password" v-model="password">
                           <span v-if='msg.password'>{{msg.password}}</span><br>
                           <strong>Confirm Password:</strong><br>
                        <input type="password" class="form-control" name="confirmPassword" v-model="confirmPassword">
                        <span v-if='msg.confirmPassword'>{{msg.confirmPassword}}</span><br>
                        <strong>File:</strong>
                        <input type="file" class="form-control" name="image" v-on:change="onFileChange"  >
                            <br><br>
                        <button  class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
          props:['myName','myPassword','myEmail','myImage','myId'],


        data() {
            return {
                id:this.myId,
              name: this.myName,
              file: this.myImage,
              success: '',
              email:this.myEmail,
              password:this.myPassword,
              confirmPassword:this.myPassword,
              msg:[],
            };
        },
          watch: {
               name(value) {
            this.eventName();
            this.name = value;
            this.check_name(value);
        },
        email(value) {
            this.eventName();
            this.email = value;
            this.check_email(value);
        },
        password(value) {
            this.eventName();

            this.password = value;
            this.checkPassword(value);
        },
        confirmPassword(value) {
            this.eventName();
            this.confirmPassword = value;
            this.checkConfirmPassword(value);
        }
    },
        methods: {
            onFileChange(e){
                alert("run");
                if(this.myImage)
                this.file=this.myImage.slice(7);


                        if(e.target.files[0])
                  this.file = e.target.files[0];

            },




        check_name(value) {
            if (/^[a-zA-Z ]+$/.test(value)) {
                this.msg[name] = '';
            } else {
                this.msg[name] = 'Keep Typing... We are waiting for correct Name';
            }
        },

        check_email(value) {
            if (/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(value)) {
                this.msg[name] = '';
            } else {
                this.msg[name] = 'Keep Typing... We are waiting for correct Email';
            }
        },
        checkPassword(value) {
            this.passwordLengthCheck(value);
        },
        checkConfirmPassword(value) {
            if (this.passwordLengthCheck(value)) {
                if (value == this.password) {
                    this.msg[name] = '';
                } else {
                    this.msg[name] = "Password does not match, please try again";
                }
            }
        },
        passwordLengthCheck(passwordToCheck) {




            if (passwordToCheck.length < 6) {
                this.msg[name] = 'Password must contain 6 characters. ' + (6 - passwordToCheck.length)+ ' more to go...';
            } else {
                this.msg[name] = '';
                return true;
            }

        },
        eventName() {
            name = event.target.name;
        },


            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                if(this.file && this.name && this.email && this.password && this.confirmPassword)
                {

 let formData = new FormData();
                formData.append('file', this.file);
                 formData.append('name', this.name);
                  formData.append('email', this.email);
                   formData.append('password', this.password);
                    formData.append('confirmPassword', this.confirmPassword);
     formData.append('id', this.id);
                axios.post('/formSubmitUpdate', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
                }
                else
                {
                    alert("all field fill propely");
                }

            }

















        },



             mounted() {
                   this.file=this.myImage.slice(9);
                   console.log(this.file);
        },
    }
</script>
