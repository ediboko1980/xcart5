/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Controller
 *
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

ItemsList.prototype.listeners.BulkEditPagesCount = function(handler)
{
  jQuery('select.page-length', handler.container).change(
    function() {
      return !handler.process('itemsPerPage', this.options[this.selectedIndex].value);
    }
  );
};

jQuery(function () {
  ItemsListQueue();
});