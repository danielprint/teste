// Generated by CoffeeScript 1.4.0
(function() {
  var onChangeMask, onSetRequireValid, onValidaCPFCNPJ;

  onValidaCPFCNPJ = function(obj) {
    var label, len, valido;
    len = obj.val().replace(/[^0-9]/g, "").length;
    label = obj.data("label");
    if (len === 14 || (len === 11 && label === "CPF")) {
      valido = validaCPFCNPJ(obj.val());
      onSetRequireValid(obj, valido, "" + label + " inválido!");
    } else {
      valido = false;
    }
    return valido;
  };

  onChangeMask = function() {
    var obj;
    obj = $(this);
    if (obj.val() === obj.prop("placeholder")) {
      return obj.val("");
    }
  };

  onSetRequireValid = function(obj, valido, msg) {
    if (!valido && !obj.prop("disabled")) {
      obj.closest(".control-group").addClass("error");
      obj.tooltip({
        title: msg
      });
      return obj.tooltip("show");
    } else {
      obj.closest(".control-group").removeClass("error");
      return obj.tooltip("destroy");
    }
  };

  jQuery(function($) {
    $("#main, #poupap_base, [data-group-cpf-cnpj]").on("click", "[data-group-cpf-cnpj-radio]", function() {
      var radio;
      radio = $(this);
      return radio.closest("[data-group-cpf-cnpj]").find(".input-prepend").find("i").attr("class", radio.attr("value") === "cpf" ? "icon-user" : "icon-briefcase").end().end().find("input:text").hide().prop("disabled", true).tooltip("destroy").filter("[data-" + radio.attr('value') + "]").show().prop("disabled", false).get(0).focus();
    });
    $("body").on("focus", "[data-mask]", onChangeMask).on("blur", "[data-mask]", onChangeMask).on("keyup", "[data-mask]", onChangeMask).on("input", "[data-mask]", onChangeMask).on("change", "[data-mask]", onChangeMask).on("click", "[data-mask]", onChangeMask);
    return $("body").on("blur", "[data-cpf],[data-cnpj]", function() {
      return onValidaCPFCNPJ($(this));
    });
  });

}).call(this);
