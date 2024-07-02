<template>
  <b-container>
    <b-row>
      <b-col id="userindex" cols="12">
        <b-col cols="12" align="right">
          <b-button
            id="addaccountbtn"
            variant="primary"
            v-b-modal.modal-1
            align="right"
            >Add Account</b-button
          >
        </b-col>
        <b-col cols="12" align="center">
          <b-col cols="6" class="my-1">
            <b-form-group>
              <b-input-group class="sm-2">
                <b-input-group-prepend is-text>
                  <b-icon icon="search"></b-icon>&nbsp;<span>Search</span>
                </b-input-group-prepend>
                <b-form-input
                  type="search"
                  v-model="filter"
                  placeholder="Type to Search"
                  style="font-size:20px;"
                ></b-form-input>
              </b-input-group>
            </b-form-group>
          </b-col>
          <b-col id="box-shadow" cols="8" align="center">
            <b-table
              responsive
              hover
              show-empty
              bordered
              v-bind:filter="filter"
              v-bind:filter-included-fields="filterOn"
              v-on:filtered="onFiltered"
              v-bind:busy="AcctTableBusy"
              v-bind:items="accounts"
              v-bind:fields="accountfields"
            >
              <template #table-busy>
                <div class="text-center text-danger my-2">
                  <b-spinner class="align-middle"></b-spinner>
                  <strong>Loading...</strong>
                </div>
              </template>
              <template #head(name)="accounts">
                {{ accounts.label }}
              </template>
              <template #head(btn)=""> </template>

              <template #cell(name)="accounts">
                {{ accounts.item.name }}
              </template>
              <template #cell(id)="accounts">
                <b-button
                  variant="primary"
                  v-bind:value="accounts.item.id"
                  v-b-modal.modal-2
                  v-on:click="GetAccountDataBtnClick"
                  >Info</b-button
                >
                <b-button
                  variant="warning"
                  v-bind:value="accounts.item.id"
                  v-b-modal.modal-3
                  v-on:click="UpdateAccountDataBtnClick"
                  >Edit</b-button
                >
                <b-button
                  variant="danger"
                  v-bind:value="accounts.item.id"
                  v-b-modal.modal-4
                  v-on:click="DeleteAccountDataBtnClick"
                  >Delete</b-button
                >
              </template>
            </b-table>
          </b-col>
        </b-col>

        <b-col cols="12">
          <b-modal
            id="modal-1"
            v-on:change="ModalChange"
            title=""
            align="center"
            ok-only
            hide-footer
          >
            <h4>Add Account</h4>
            <ValidationObserver v-slot="{ handleSubmit }" ref="form">
              <b-form
                id="signinform"
                v-on:submit.prevent="handleSubmit(AddAcctFormSubmit)"
              >
                <ValidationProvider
                  rules="required|min:1|max:255"
                  v-slot="{ errors }"
                >
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="tag-fill"></b-icon>&nbsp;<span>Name</span>
                    </b-input-group-prepend>
                    <b-form-input
                      type="text"
                      v-model="name"
                      placeholder=""
                      style="font-size:20px;"
                    ></b-form-input>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider rules="min:0|max:255" v-slot="{ errors }">
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="link45deg"></b-icon>&nbsp;<span>URI</span>
                    </b-input-group-prepend>
                    <b-form-input
                      type="text"
                      v-model="uri"
                      placeholder="https://google.com"
                      style="font-size:20px;"
                    ></b-form-input>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider
                  rules="email|min:1|max:255"
                  v-slot="{ errors }"
                >
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="envelope"></b-icon>&nbsp;<span>Email</span>
                    </b-input-group-prepend>
                    <b-form-input
                      type="text"
                      v-model="email"
                      placeholder=""
                      style="font-size:20px;"
                    ></b-form-input>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider rules="min:1|max:255" v-slot="{ errors }">
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="person-circle"></b-icon>&nbsp;<span
                        >Username</span
                      >
                    </b-input-group-prepend>
                    <b-form-input
                      type="text"
                      v-model="username"
                      placeholder=""
                      style="font-size:20px;"
                    ></b-form-input>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider rules="min:1|max:255" v-slot="{ errors }">
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="lock-fill"></b-icon>&nbsp;<span
                        >Password</span
                      >
                    </b-input-group-prepend>
                    <b-form-input
                      v-bind:type="passwordtype"
                      v-model="password"
                      placeholder=""
                      style="font-size:20px;"
                    ></b-form-input>
                    <b-input-group-append>
                      <b-button
                        variant="outline-primary"
                        v-on:click="RevealPasswordBtnClick"
                        ><b-icon icon="eye-fill"></b-icon
                      ></b-button>
                    </b-input-group-append>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider rules="min:0|max:60000" v-slot="{ errors }">
                  <b-form-group
                    id="input-group-1"
                    label="Notes"
                    label-for="input-1"
                    description=""
                    align="left"
                  >
                    <b-form-textarea
                      id="textarea"
                      v-model="notes"
                      placeholder="Enter something..."
                      rows="3"
                      max-rows="4"
                    ></b-form-textarea>
                  </b-form-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <b-button
                  id="widebtn"
                  v-bind:disabled="isSubmitBtnDisabled"
                  type="submit"
                  variant="primary"
                  >Add</b-button
                >
                <br />
                <div v-html="messages"></div>
              </b-form>
            </ValidationObserver>
          </b-modal>
        </b-col>

        <b-col cols="12">
          <b-modal
            id="modal-2"
            v-on:change="ModalChange"
            title=""
            align="center"
            ok-only
            hide-footer
          >
            <h4>Account</h4>
            <b-form id="accountsform">
              <b-input-group class="sm-2">
                <b-input-group-prepend is-text>
                  <b-icon icon="tag-fill"></b-icon>&nbsp;<span>Name</span>
                </b-input-group-prepend>
                <b-form-input
                  type="text"
                  v-model="accountname"
                  placeholder=""
                  style="font-size:20px;"
                  readonly
                ></b-form-input>
              </b-input-group>
              <br />
              <b-input-group class="sm-2">
                <b-input-group-prepend is-text>
                  <b-icon icon="link45deg"></b-icon>&nbsp;<span>URI</span>
                </b-input-group-prepend>
                <b-form-input
                  type="text"
                  v-model="accounturi"
                  placeholder=""
                  style="font-size:20px;"
                  readonly
                ></b-form-input>
              </b-input-group>
              <br />
              <b-input-group class="sm-2">
                <b-input-group-prepend is-text>
                  <b-icon icon="envelope"></b-icon>&nbsp;<span>Email</span>
                </b-input-group-prepend>
                <b-form-input
                  type="text"
                  v-model="accountemail"
                  placeholder=""
                  style="font-size:20px;"
                  readonly
                ></b-form-input>
              </b-input-group>
              <br />
              <b-input-group class="sm-2">
                <b-input-group-prepend is-text>
                  <b-icon icon="person-circle"></b-icon>&nbsp;<span
                    >Username</span
                  >
                </b-input-group-prepend>
                <b-form-input
                  type="text"
                  v-model="accountusername"
                  placeholder=""
                  style="font-size:20px;"
                  readonly
                ></b-form-input>
              </b-input-group>
              <br />
              <b-input-group class="sm-2">
                <b-input-group-prepend is-text>
                  <b-icon icon="lock-fill"></b-icon>&nbsp;<span>Password</span>
                </b-input-group-prepend>
                <b-form-input
                  id="passwordinput"
                  v-bind:type="accountpasswordtype"
                  v-model="accountpassword"
                  placeholder=""
                  style="font-size:20px;"
                  readonly
                ></b-form-input>
                <b-input-group-append>
                  <b-button
                    variant="outline-primary"
                    v-on:click="RevealAccountPasswordBtnClick"
                    ><b-icon icon="eye-fill"></b-icon
                  ></b-button>
                  <b-button
                    variant="outline-primary"
                    v-on:click="CopyBtnClick"
                    v-bind:disabled="isCopyBtnDisabled"
                    ><b-icon icon="clipboard"></b-icon
                  ></b-button>
                </b-input-group-append>
              </b-input-group>
              <small id="errors"
                >Copying the password will reveal it for a brief moment</small
              >
              <br />
              <b-form-group
                id="input-group-1"
                label="Notes"
                label-for="input-1"
                description=""
                align="left"
              >
                <b-form-textarea
                  id="textarea"
                  v-model="accountnotes"
                  placeholder="Enter something..."
                  rows="3"
                  max-rows="4"
                  readonly
                ></b-form-textarea>
              </b-form-group>
              <br />
            </b-form>
          </b-modal>
        </b-col>

        <b-col cols="12">
          <b-modal
            id="modal-3"
            v-on:change="ModalChange"
            title=""
            align="center"
            ok-only
            hide-footer
          >
            <h4>Edit Account</h4>
            <ValidationObserver v-slot="{ handleSubmit }" ref="form">
              <b-form
                id="signinform"
                v-on:submit.prevent="handleSubmit(UpdateAcctFormSubmit)"
              >
                <ValidationProvider
                  rules="required|min:1|max:255"
                  v-slot="{ errors }"
                >
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="tag-fill"></b-icon>&nbsp;<span>Name</span>
                    </b-input-group-prepend>
                    <b-form-input
                      type="text"
                      v-model="editaccountname"
                      placeholder=""
                      style="font-size:20px;"
                    ></b-form-input>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider rules="min:0|max:255" v-slot="{ errors }">
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="link45deg"></b-icon>&nbsp;<span>URI</span>
                    </b-input-group-prepend>
                    <b-form-input
                      type="text"
                      v-model="editaccounturi"
                      placeholder="https://google.com"
                      style="font-size:20px;"
                    ></b-form-input>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider
                  rules="email|min:1|max:255"
                  v-slot="{ errors }"
                >
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="envelope"></b-icon>&nbsp;<span>Email</span>
                    </b-input-group-prepend>
                    <b-form-input
                      type="text"
                      v-model="editaccountemail"
                      placeholder=""
                      style="font-size:20px;"
                    ></b-form-input>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider rules="min:1|max:255" v-slot="{ errors }">
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="person-circle"></b-icon>&nbsp;<span
                        >Username</span
                      >
                    </b-input-group-prepend>
                    <b-form-input
                      type="text"
                      v-model="editaccountusername"
                      placeholder=""
                      style="font-size:20px;"
                    ></b-form-input>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider rules="min:1|max:255" v-slot="{ errors }">
                  <b-input-group class="sm-2">
                    <b-input-group-prepend is-text>
                      <b-icon icon="lock-fill"></b-icon>&nbsp;<span
                        >Password</span
                      >
                    </b-input-group-prepend>
                    <b-form-input
                      v-bind:type="editpasswordtype"
                      v-model="editaccountpassword"
                      placeholder=""
                      style="font-size:20px;"
                    ></b-form-input>
                    <b-input-group-append>
                      <b-button
                        variant="outline-primary"
                        v-on:click="RevealEditPasswordBtnClick"
                        ><b-icon icon="eye-fill"></b-icon
                      ></b-button>
                    </b-input-group-append>
                  </b-input-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <ValidationProvider rules="min:0|max:60000" v-slot="{ errors }">
                  <b-form-group
                    id="input-group-1"
                    label="Notes"
                    label-for="input-1"
                    description=""
                    align="left"
                  >
                    <b-form-textarea
                      id="textarea"
                      v-model="editaccountnotes"
                      placeholder=""
                      rows="3"
                      max-rows="4"
                    ></b-form-textarea>
                  </b-form-group>
                  <small id="errors">{{ errors[0] }}</small>
                </ValidationProvider>
                <br />
                <b-button
                  id="widebtn"
                  v-bind:disabled="isSubmitBtnDisabled"
                  type="submit"
                  variant="primary"
                  >Update</b-button
                >
                <br />
                <div v-html="messages"></div>
              </b-form>
            </ValidationObserver>
          </b-modal>
        </b-col>

        <b-col cols="12">
          <b-modal id="modal-4" title="" align="center" ok-only hide-footer>
            <b-col cols="12">
              <h4>Delete Account?</h4>
            </b-col>
            <br />
            <b-button
              variant="primary"
              v-bind:disabled="isSubmitBtnDisabled"
              v-on:click="DeleteAcctFormSubmit"
              >Yes</b-button
            >
            <b-button variant="danger" v-on:click="CancelDeleteAcctFormSubmit"
              >Cancel</b-button
            >
          </b-modal>
        </b-col>
      </b-col>
    </b-row>
  </b-container>
</template>

<style scoped>
  #userindex {
    margin: 50px 0px 0px 0px;
  }

  #box-shadow {
    padding: 20px;
    margin: 10px 0px 0px 0px;
  }
</style>

<script>
  import {
    ValidationObserver,
    ValidationProvider,
    extend,
    configure,
  } from "vee-validate";

  configure({
    events: "",
  });

  import {
    required,
    email,
    alpha_num,
    min,
    max,
  } from "vee-validate/dist/rules";

  extend("required", {
    ...required,
    message: "This field is required",
  });

  extend("min", {
    ...min,
    message: "Characters should be greater than {length}",
  });

  extend("max", {
    ...max,
    message: "Characters should be lesser than {length}",
  });

  extend("alpha_num", {
    ...alpha_num,
    message: "Only Characters and numbers with no spaces are allowed",
  });

  extend("email", {
    ...email,
    message: "This is not an email",
  });

  export default {
    name: "UserIndex",
    components: {
      ValidationProvider,
      ValidationObserver,
    },
    metaInfo: {
      title: "Eve Password Manager",
      titleTemplate: "%s",
    },
    data: function() {
      return {
        name: "",
        uri: "",
        email: "",
        username: "",
        password: "",
        notes: "",
        messages: "",
        accountname: "",
        accounturi: "",
        accountemail: "",
        accountusername: "",
        accountpassword: "",
        accountnotes: "",
        editaccountid: "",
        editaccountname: "",
        editaccounturi: "",
        editaccountemail: "",
        editaccountusername: "",
        editaccountpassword: "",
        editaccountnotes: "",
        deleteaccountid: "",
        messages: "",
        accountfields: [
          {
            key: "name",
            label: "Name",
            sortable: false,
            filterByFormatted: true,
          },
          {
            key: "id",
            label: "",
            sortable: false,
            filterByFormatted: false,
          },
        ],
        accounts: [],
        filter: null,
        filterOn: [],
        AcctTableBusy: true,
        accountpasswordtype: "password",
        editpasswordtype: "password",
        passwordtype: "password",
        isSubmitBtnDisabled: false,
        isCopyBtnDisabled: true,
      };
    },
    mounted() {
      var self = this;
      axios
        .get("/user/index/account/get", {})
        .then(function(response) {
          /*console.log(response.data);*/
          self.accounts = response.data.item;
          self.AcctTableBusy = false;
        })
        .catch(function(error) {
          /*console.log(error);*/
        });
    },
    updated() {},
    computed: {},
    methods: {
      handleSubmit: function() {},
      CopyBtnClick: function() {
        var self = this;
        self.accountpasswordtype = "text";

        setTimeout(function() {
          var copyText = document.getElementById("passwordinput");
          copyText.select();
          copyText.setSelectionRange(0, 99999);
          document.execCommand("copy");
          self.accountpasswordtype = "password";
        }, 500);
      },
      RevealAccountPasswordBtnClick: function() {
        var self = this;
        var accountpasswordtype = self.accountpasswordtype;
        if (accountpasswordtype == "password") {
          self.accountpasswordtype = "text";
        } else if (accountpasswordtype == "text") {
          self.accountpasswordtype = "password";
        }
      },
      RevealEditPasswordBtnClick: function() {
        var self = this;
        var editpasswordtype = self.editpasswordtype;
        if (editpasswordtype == "password") {
          self.editpasswordtype = "text";
        } else if (editpasswordtype == "text") {
          self.editpasswordtype = "password";
        }
      },
      RevealPasswordBtnClick: function() {
        var self = this;
        var passwordtype = self.passwordtype;
        if (passwordtype == "password") {
          self.passwordtype = "text";
        } else if (passwordtype == "text") {
          self.passwordtype = "password";
        }
      },
      GetAccountDataBtnClick: function() {
        var self = this;
        self.isCopyBtnDisabled = true;
        var id = event.target.value;

        axios
          .post("/user/index/account/data/get", {
            id: id,
          })
          .then(function(response) {
            /*console.log(response.data);*/
            self.accountname = response.data.item[0].name;
            self.accounturi = response.data.item[0].uri;
            self.accountusername = response.data.item[0].username;
            self.accountemail = response.data.item[0].email;
            self.accountpassword = response.data.item[0].password;
            self.accountnotes = response.data.item[0].notes;

            self.isCopyBtnDisabled = false;
          })
          .catch(function(error) {
            /*console.log(error);*/
          });
      },
      AddAcctFormSubmit: function() {
        var self = this;
        self.isSubmitBtnDisabled = true;
        axios
          .post("/user/index/account/create", {
            name: self.name,
            email: self.email,
            uri: self.uri,
            username: self.username,
            password: self.password,
            notes: self.notes,
          })
          .then(function(response) {
            /*console.log(response.data);*/
            if (response.data.error == "success") {
              self.$bvModal.hide("modal-1");
              self.isSubmitBtnDisabled = false;
              self.UserIndexAccountGet();
            } else if (response.data.error == "invalid") {
              self.messages =
                "<small id='errors' align='center'>Invalid Inputs</small>";
              self.isSubmitBtnDisabled = false;
            }
          })
          .catch(function(error) {
            /*console.log(error);*/
          });
      },
      UpdateAccountDataBtnClick: function() {
        var self = this;
        var id = event.target.value;
        axios
          .post("/user/index/account/data/get", {
            id: id,
          })
          .then(function(response) {
            /*console.log(response.data);*/
            self.editaccountid = id;
            self.editaccountname = response.data.item[0].name;
            self.editaccounturi = response.data.item[0].uri;
            self.editaccountusername = response.data.item[0].username;
            self.editaccountemail = response.data.item[0].email;
            self.editaccountpassword = response.data.item[0].password;
            self.editaccountnotes = response.data.item[0].notes;

            self.isCopyBtnDisabled = false;
          })
          .catch(function(error) {
            /*console.log(error);*/
          });
      },
      UpdateAcctFormSubmit: function() {
        var self = this;
        self.isSubmitBtnDisabled = true;
        axios
          .post("/user/index/account/update", {
            id: self.editaccountid,
            name: self.editaccountname,
            email: self.editaccountemail,
            uri: self.editaccounturi,
            username: self.editaccountusername,
            password: self.editaccountpassword,
            notes: self.editaccountnotes,
          })
          .then(function(response) {
            /*console.log(response.data);*/
            if (response.data.error == "success") {
              self.$bvModal.hide("modal-3");
              self.isSubmitBtnDisabled = false;
              self.UserIndexAccountGet();
            } else if (response.data.error == "invalid") {
              self.messages =
                "<small id='errors' align='center'>Invalid Inputs</small>";
              self.isSubmitBtnDisabled = false;
            }
          })
          .catch(function(error) {
            /*console.log(error);*/
          });
      },
      DeleteAccountDataBtnClick: function() {
        var self = this;
        var id = event.target.value;
        self.deleteaccountid = id;
      },
      DeleteAcctFormSubmit: function() {
        var self = this;
        self.isSubmitBtnDisabled = true;
        axios
          .post("/user/index/account/delete", {
            id: self.deleteaccountid,
          })
          .then(function(response) {
            /*console.log(response.data);*/
            if (response.data.error == "success") {
              self.$bvModal.hide("modal-4");
              self.isSubmitBtnDisabled = false;
              self.UserIndexAccountGet();
            } else if (response.data.error == "invalid") {
              self.messages =
                "<small id='errors' align='center'>Invalid Inputs</small>";
              self.isSubmitBtnDisabled = false;
            }
          })
          .catch(function(error) {
            /*console.log(error);*/
          });
      },
      CancelDeleteAcctFormSubmit: function() {
        this.$bvModal.hide("modal-4");
      },
      UserIndexAccountGet: function() {
        var self = this;
        axios
          .get("/user/index/account/get", {})
          .then(function(response) {
            /*console.log(response.data);*/
            self.accounts = response.data.item;
            self.AcctTableBusy = false;
          })
          .catch(function(error) {
            /*console.log(error);*/
          });
      },
      ModalChange: function() {
        this.accountpasswordtype = "password";
        this.editpasswordtype = "password";
        this.passwordtype = "password";
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length;
        this.currentPage = 1;
      },
    },
  };
</script>
